<?php

namespace RSSReader\Utilities;

class Feed
{

    private $lines;
    private $print_to_file = false;
    private $file_name;

    private $FilePrinter;
    private $Printer;

    public function __construct()
    {
        $this->Printer = new Printer();
    }

    public function feed($paper, $title)
    {
        if($this->print_to_file == true) {
            $this->FilePrinter->openFile($this->file_name);
            $this->runPrint($this->FilePrinter, $paper, $title);
            $this->FilePrinter->closeFile($this->file_name);
        }

        $this->runPrint($this->Printer, $paper, $title);
  
    }

    private function runPrint($Printer, $paper, $title)
    {
        $count = 0;

        $Printer->printLine();
        $Printer->print($title);

        foreach($paper as $item) {

            $count++;
            if($count > $this->lines) {
                break;
            }

            $Printer->print($item->title);
            $Printer->print($item->pubDate);
            $Printer->print($item->link);
            $Printer->printLine();
        }
    }

    public function setNrOfLines($lines)
    {
        $this->lines = $lines;
    }

    public function startFilePrinter($file)
    {
        $this->print_to_file = true;
        $this->file_name = $file;
        $this->FilePrinter = new FilePrinter();
    }
}
