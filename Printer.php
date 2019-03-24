<?php

namespace RSSReader\Utilities;

use RSSReader\Interfaces\InterfacePrinter;

class Printer implements InterfacePrinter
{
   
    public function print($text)
    {
            echo $text.PHP_EOL;
    }    

    public function printLine()
    {
            echo PHP_EOL;
    }    
}
