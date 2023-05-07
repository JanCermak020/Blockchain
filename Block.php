<?php
class Block
{
    private int $id;
    private string $value;
    private string $hash;
    private $dttm;
    public function __construct(string $val,int $lastid=0)
    {
        $this->id=$lastid+1;
        $this->value=$val;
        $this->dttm=date("Y/m/d/H/i/s");
        $this->hash=$this->generateHash();
    }
    function set_dttm(int $set){
        $this->dttm=$set;
        return $this;
    }
    function set_id(int $set){
        $this->id=$set;
        return $this;
    }
    function set_value(string $set):static {
        $this->value=$set;
        return $this;
    }
    function set_hash(string $set):static{
        $this->hash=$set;
        return $this;
    }
    function get_dttm(){
        return $this->dttm;
    }
    function get_id(){
        return $this->id;
    }
    function get_value(){
        return $this->value;
    }
    function get_hash(){
        return $this->hash;
    }
    public function generateHash(string $prevHash='')
    {
        return hash("SHA1",$this->id.'|'.$this->value.'|'.$this->dttm.'|'.$prevHash);
    }

}