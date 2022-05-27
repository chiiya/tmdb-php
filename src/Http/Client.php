<?php declare(strict_types=1);

namespace Chiiya\Tmdb\Http;

use Chiiya\Tmdb\Query\QueryParameterInterface;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use JsonSerializable;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Client implements ClientInterface
{
    public function __construct(
        protected GuzzleClient $client,
    ) {}

    /**
     * Create an authenticated TMDB client.
     */
    public static function createAuthenticatedClient(string $token): static
    {
        $client = new GuzzleClient(array_merge(self::getGuzzleConfig(), [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ],
            'base_uri' => 'https://api.themoviedb.org/3/',
        ]));

        return new static($client);
    }

    /**
     * Get default guzzle config.
     */
    protected static function getGuzzleConfig(): array
    {
        $stack = HandlerStack::create();

        // Handle rate-limiting
        $stack->push(
            Middleware::retry(function ($retries, RequestInterface $request, ?ResponseInterface $response = null) {
                if ($retries >= 5) {
                    return false;
                }

                if ($response !== null) {
                    if ($response->getStatusCode() >= 500) {
                        return true;
                    }

                    if ($response->getStatusCode() === 429) {
                        sleep(((int) $response->getHeaderLine('retry-after')) ?: 1);

                        return true;
                    }
                }

                return false;
            }),
        );

        return ['handler' => $stack];
    }

    public function get(string $url, array $parameters = []): array
    {
        return $this->execute('GET', $url, $parameters);
    }

    public function post(string $url, JsonSerializable $data): array
    {
        return $this->execute('POST', $url, [], json_encode($data));
    }

    public function put(string $url, JsonSerializable $data): array
    {
        return $this->execute('PUT', $url, [], json_encode($data));
    }

    public function execute(string $method, string $url, array $parameters, ?string $body = null): array
    {
        $request = new Request($method, $url, $this->commonHeaders(), $body);

        foreach ($parameters as $key => $filter) {
            if ($filter instanceof QueryParameterInterface) {
                unset($parameters[$key]);
                $parameters[$filter->getKey()] = $filter->getValue();
            }
        }

        $response = $this->client->send($request, ['query' => $parameters]);

        return json_decode($response->getBody()->getContents(), true);
    }

    protected function commonHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
