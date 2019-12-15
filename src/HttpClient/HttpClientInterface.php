<?php
namespace Lifeeka\TriposoSDK\HttpClient;

interface HttpClientInterface
{
    function appendUrl(string $urlAppends);

    function setHeaders($headers);

    function get(array $param = []);

    function post(array $param);

    function put(array $param);

    function delete(array $param);

    function getStatusCode();
}
