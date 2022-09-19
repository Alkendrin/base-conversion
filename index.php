<!DOCTYPE html>
<html>
<body>

<?php

class base{
    private $decimal;
    private $binary;
    private $octal;
    private $hexadecimal;
    private $binary_array = array();
    private $octal_array = array();
    private $hexa_array = array();

    public function deciToBinary(){
        $decimal = $this->decimal;
        $result_array = array();
        while ($decimal != 0){
            $r = ($decimal % 2);
            $decimal = floor($decimal / 2);
            array_push($this->binary_array,$r);
        }
        $count = count($this->binary_array);
        for($i = 0; $i < $count; $i++) {
            $x = array_pop($this->binary_array);
            array_push($result_array,$x);
        }
        $result = (int) implode("",$result_array);
        $this->binary = $result;
    }
    public function deciToOctal(){
        $decimal = $this->decimal;
        $result_array = array();
        while ($decimal != 0){
            $r = ($decimal % 8);
            $decimal = floor($decimal / 8);
            array_push($this->octal_array,$r);
        }
        $count = count($this->octal_array);
        for($i = 0; $i < $count; $i++) {
            $x = array_pop($this->octal_array);
            array_push($result_array,$x);
        }
        $result = (int) implode("",$result_array);
        $this->octal = $result;
    }
    public function deciToHexa(){
        $decimal = $this->decimal;
        $result_array = array();
        while ($decimal != 0){
            $r = ($decimal % 16);
            $decimal = floor($decimal / 16);
            array_push($this->hexa_array,$r);
        }
        $count = count($this->hexa_array);
        for($i = 0; $i < $count; $i++) {
            $x = array_pop($this->hexa_array);
            $x = $this->hexaToLetter($x);
            array_push($result_array,$x);
        }
        $result = implode("",$result_array);
        $this->hexadecimal = $result;
    }



    public function binaryToDeci(){
        $factor = 1;
        $array = str_split($this->binary);
        $result = 0;
        $count = count($array);

        for($i = 0; $i < $count; $i++) {
            $result += (array_pop($array) * $factor);
            $factor *= 2;
        }
        $this->decimal = $result;

    }
    public function octalToDeci(){
        $factor = 1;
        $array = str_split($this->octal);
        $result = 0;
        $count = count($array);

        for($i = 0; $i < $count; $i++) {
            $result += (array_pop($array) * $factor);
            $factor *= 8;
        }
        $this->decimal = $result;
    }
    public function hexaToDeci(){
        $factor = 1;
        $array = str_split($this->hexadecimal);
        $result = 0;
        $count = count($array);

        for($i = 0; $i < $count; $i++) {
            $number = $this->letterToHexa(array_pop($array));
            $result += ($number * $factor);
            $factor *= 16;
        }
        $this->decimal = $result;
    }

    public function set_decimal($decimal){
        $this->decimal = $decimal;
        $this->deciToBinary();
        $this->deciToOctal();
        $this->deciToHexa();
    }
    public function set_binary($binary){
        $this->binary = $binary;
        $this->binaryToDeci();
        $this->deciToOctal();
        $this->deciToHexa();
    }
    public function set_octal($octal){
        $this->octal= $octal;
        $this->octalToDeci();
        $this->deciToBinary();
        $this->deciToHexa();
    }
    public function set_hexadecimal($hexadecimal){
        $this->hexadecimal = $hexadecimal;
        $this->hexaToDeci();
        $this->deciToBinary();
        $this->deciToOctal();
    }


    public function get_decimal(){
        echo $this->decimal."<br>";
    }
    public function get_binary(){
        echo $this->binary."<br>";
    }
    public function get_octal(){
        echo $this->octal."<br>";
    }
    public function get_hexadecimal(){
        echo $this->hexadecimal."<br>";
    }

    public function hexaToLetter($x){
        switch($x){
            case 10: $x = "A"; return $x; break;
            case 11: $x = "B"; return $x; break;
            case 12: $x = "C"; return $x; break;
            case 13: $x = "D"; return $x; break;
            case 14: $x = "E"; return $x; break;
            case 15: $x = "F"; return $x; break;
        }
    }
    public function letterToHexa($x){
        switch($x){
            case "A": $x = 10; return $x; break;
            case "B": $x = 11; return $x; break;
            case "C": $x = 12; return $x; break;
            case "D": $x = 13; return $x; break;
            case "E": $x = 14; return $x; break;
            case "F": $x = 15; return $x; break;
            default: return $x;
        }
    }
}

$base = new base();
$base->set_decimal(14);
$base->get_hexadecimal();
$base->get_binary();
$base->set_binary(1011);
$base->get_decimal();
$base->get_hexadecimal();
$base->set_hexadecimal('C');
$base->get_decimal();
$base->get_binary();
$base->get_octal();





?>
<!-- 
PseudoCode

Create class
declare attributes
use setters to insert an attribute
create conversion function
automatically call conversion function
use getters to get conversion


Sampmle run

set_decimal(100);
get_binary();
get_octal();





 -->
</body>
</html>