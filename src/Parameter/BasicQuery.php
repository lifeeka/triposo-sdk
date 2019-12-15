<?php

namespace Lifeeka\TriposoSDK\Parameter;

class BasicQuery implements QueryInterface
{

    private $name;
    private $value;

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue(): string
    {
        return $this->value;
    }

    function setAttribute($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }


}
