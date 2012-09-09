<?php
/**
 * Cree par: med.programmer@gmail.com
 * Date: 8/19/12
 * Heure: 5:45 PM
 */
class Configuration
{
    private function __construct(){

    }
    public static  function INI($source){
        return new ConfigurationINI($source);
    }
}
