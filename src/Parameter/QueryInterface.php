<?php
namespace Lifeeka\TriposoSDK\Parameter;

interface QueryInterface
{
    function getValue():string;
    function getName():string;
    function setAttribute($name, $value);
}
