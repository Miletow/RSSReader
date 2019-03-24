<?php

namespace RSSReader\Utilities;

use RSSReader\Interfaces\InterfacePrinter;

class FilePrinter implements InterfacePrinter
{

    protected $file;

    public function openFile($file_name)
    {
        $this->file = fopen($file_name, 'a+');
        if(file_exists($file_name) == false) {
            throw new Exception("File not created.");
        }   
    }

    public function closeFile()
    {
            fclose($this->file);
            if(is_resource($this->file) == true) {
                throw new Exception("File not closed.");
             }
    }

    public function print($text)
    {
            fwrite($this->file, $text.PHP_EOL);
    }    

    public function printLine()
    {
            fwrite($this->file, PHP_EOL);
    }    

    
}
