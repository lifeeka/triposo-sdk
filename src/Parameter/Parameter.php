<?php

namespace Lifeeka\TriposoSDK\Parameter;

class Parameter
{
    private $query = [];

    function addParameter(QueryInterface $query)
    {
        $this->query[] = $query;
    }

    function toArray()
    {
        $queryArray = [];

        /** @var QueryInterface $query */
        foreach ($this->query as $query) {
            $queryArray[$query->getName()] = $query->getValue();
        }
        return $queryArray;
    }

    function getQuery()
    {
        return http_build_query($this->toArray());
    }
}
