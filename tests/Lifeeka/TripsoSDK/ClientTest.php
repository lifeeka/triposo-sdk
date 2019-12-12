<?php

namespace Lifeeka\TripsoSDK;

use Lifeeka\TripsoSDK\HttpClient\GuzzleClient;
use Lifeeka\TripsoSDK\Parameter\BasicQuery;
use Lifeeka\TripsoSDK\Parameter\Parameter;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

    public function testRequest()
    {
        $httpClient = new GuzzleClient("https://www.triposo.com/api");

        $parameters = new Parameter();

        $partOf = new BasicQuery();
        $partOf->setAttribute("id", "Amsterdam");
        $parameters->addParameter($partOf);

        $authAccount = new BasicQuery();
        $authAccount->setAttribute("account", "XWXA7CQG");
        $parameters->addParameter($authAccount);

        $authToken = new BasicQuery();
        $authToken->setAttribute("token", "cu3nzy3x6w39x44ttjx4exdhaekqgpoq");
        $parameters->addParameter($authToken);


        $client = new Client(20190906, 'location', $parameters);
        $client->setHttpClient($httpClient);
        $response = $client->request();

        s($response);

    }
}
