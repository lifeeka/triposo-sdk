<?php
namespace Lifeeka\TriposoSDK\HttpClient;


use GuzzleHttp\Client;

class GuzzleClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    private $client;
    private $baseUrl;

    private $lastResponse;
    private $statusCode;

    public function __construct(string $baseUrl)
    {
        $this->client = new  Client();
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param string $urlAppends
     */
    function appendUrl(string $urlAppends)
    {
        $this->baseUrl .= '/' . $urlAppends;
    }

    /**
     * @param $headers
     */
    function setHeaders($headers)
    {
        $this->client->setDefaultOption('headers', $headers);
    }

    /**
     * @param array $param
     *
     * @return array
     */
    function get(array $param = []): array
    {
        $param['http_errors'] = false;
        $this->lastResponse = $this->client->get($this->baseUrl, $param);
        $this->statusCode = $this->lastResponse->getStatusCode();
        return json_decode($this->lastResponse->getBody()->getContents(), true);
    }

    /**
     * @param array $param
     *
     * @return mixed
     */
    function post(array $param)
    {
        $param['http_errors'] = false;
        $this->lastResponse = $this->client->post($this->baseUrl, $param);
        $this->statusCode = $this->lastResponse->getStatusCode();
        return json_decode($this->lastResponse->getBody()->getContents(), true);
    }

    /**
     * @param array $param
     *
     * @return mixed
     */
    function put(array $param)
    {
        $param['http_errors'] = false;
        $this->lastResponse = $this->client->request('PUT', $this->baseUrl, $param);
        $this->statusCode = $this->lastResponse->getStatusCode();
        return json_decode($this->lastResponse->getBody()->getContents(), true);
    }

    /**
     * @param array $param
     *
     * @return mixed
     */
    function delete(array $param = [])
    {
        $param['http_errors'] = false;
        $this->lastResponse = $this->client->request('DELETE', $this->baseUrl, $param);
        $this->statusCode = $this->lastResponse->getStatusCode();
        return json_decode($this->lastResponse->getBody()->getContents(), true);
    }

    /**
     * @return mixed
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

}
