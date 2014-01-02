<?php

class twAdminJavaScriptHolder
{
    protected static $parameterHolder = null;

    public static function initialize($parameters = array())
    {
        self::$parameterHolder = new sfParameterHolder();
        self::$parameterHolder->add($parameters);
    }

    /**
     * Zwraca uchwyt do sfParameterHolder dla JavaScriptu
     *
     * @return sfParameterHolder
     */
    public static function getParameterHolder()
    {
        return self::$parameterHolder;
    }
}

