<?php

namespace Lifeeka\TripsoSDK;

use Lifeeka\TripsoSDK\HttpClient\HttpClientInterface;
use Lifeeka\TripsoSDK\Parameter\Parameter;

class Client
{
    private $accountId;
    private $endpoint;
    private $parameters;
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    public function __construct($accountId, $endpoint, Parameter $parameters)
    {
        $this->accountId = $accountId;
        $this->endpoint = $endpoint;
        $this->parameters = $parameters;
    }

    /**
     * @param HttpClientInterface $httpClient
     */
    function setHttpClient(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    function request()
    {
        $queryArray = $this->parameters->toArray();
        $this->httpClient->appendUrl($this->accountId);
        $this->httpClient->appendUrl($this->endpoint.'.json');

        return $this->httpClient->get(["query"=>$queryArray]);
    }
}
