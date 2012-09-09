<?php
/**
 * Cree par: med.programmer@gmail.com
 * Date: 8/19/12
 * Heure: 5:49 PM
 */
abstract class ConfigurationBase
{
    private $items=array();
    private $source="";
    public function __construct($path){
        $this->setSource($path);
    }
    public abstract function read();
    public abstract function write();
    public function setItems($items)
    {
        $this->items = $items;
    }

    public function getItems()
    {
        return $this->items;
    }
    public function get($name){
        return $this->items[$name];
    }
    public function is_set($name){
        return isset($this->items[$name]);
    }
    public function set($name,$value){
        $this->items[$name]=$value;
    }
    public function delete($name){
        $this->items[$name]="";
    }

    public function setSource($source)
    {
        $this->source = $source;
    }

    public function getSource()
    {
        return $this->source;
    }
}
