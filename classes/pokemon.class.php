<?php

class Pokemon{
    //Properties
    private $name;
    private $id;
    private $pic;
    private $move1;
    private $move2;
    private $move3;
    private $move4;

    //Constructor
    public function __construct($name,$id,$pic,$move1,$move2,$move3,$move4){
        $this->name=$name;
        $this->id=$id;
        $this->pic=$pic;
        $this->move1=$move1;
        $this->move2=$move2;
        $this->move3=$move3;
        $this->move4=$move4;
    }

    //Methods
    public function getName(){
        return $this->name;
    }

    public function getId(){
        return $this->id;
    }

    public function getPic(){
        return $this->pic;
    }

    public function getMove1(){
        return $this->move1;
    }

    public function getMove2(){
        return $this->move2;
    }

    public function getMove3(){
        return $this->move3;
    }

    public function getMove4(){
        return $this->move4;
    }
}
