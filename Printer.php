<?php

interface InterfacePrinter{

    public function print($text);
    public function printLine();
}


class Printer implements InterfacePrinter{
   
    public function print($text){
            echo $text.PHP_EOL;
    }    

    public function printLine(){
            echo PHP_EOL;
    }    
}

