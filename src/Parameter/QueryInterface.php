<?php
namespace Lifeeka\TripsoSDK\Parameter;

interface QueryInterface
{
    function getValue():string;
    function getName():string;
    function setAttribute($name, $value);
}
