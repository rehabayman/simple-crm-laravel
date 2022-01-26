<?php

namespace App\Enums;

use ReflectionClass;
use UnexpectedValueException;

class Enum {

    public static function getConstantList()
    {
        $reflected = new ReflectionClass(new static());

        return $reflected->getConstants();
    }

    public static function getConstantByKey($key)
    {
        $reflected = new ReflectionClass(new static());
        
        if(array_key_exists($key, array_keys($reflected->getConstants()))) {
            throw new UnexpectedValueException('Key '.$key.' is not part of the enum '.get_called_class());
        }

        return $reflected->getConstants()[''.$key.''];
    }

}