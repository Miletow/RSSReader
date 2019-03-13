<?php

interface Questions{
    public function askArrangeSetting();
    public function askNumberOfItems();
    public function askPrintSetting();
    public function askFileformat();
}

class Input{

    public function getInput(){

        $line = readline("Command: ");
        if(readline_add_history($line) == false){
            throw new Exception("Input not stored.");
        }

        return $line;
    }

}

class Menu implements Questions{

    private $Input;
    private $Printer;
    
    public function __construct(){
        $this->Input = new Input();
        $this->Printer = new Printer();
    }
    
    public function askArrangeSetting(){

        $this->Printer->print("Enter 'title' to sort by title and 'date' to sort by date.");
        $answer = $this->Input->getInput();

        if($answer == "title" || $answer == "date")
        return $answer;

        $this->askAgain();
        $this->askArrangeSetting();            
    }

    public function askPrintSetting(){

        $this->Printer->print("Would you like to print to file aswell?(y/n).");
        $answer = $this->Input->getInput();
    
        if($answer == "y")
        return true;
        else if($answer == "n")
        return false;
        
        $this->askAgain();
        $this->askPrintSetting();
    }

    public function askNumberOfItems(){
            
        $this->Printer->print("Insert amount of items you would you like to be displayed per website.");
        $answer = (int)$this->Input->getInput();

        if(is_int($answer))
            return $answer;            

        $this->askAgain();
        $this->askNumberOfItems();
    }

    public function askFileformat(){

        $this->Printer->print("Please enter filename and format. Example 'RssFeed.txt'");
        $answer = $this->Input->getInput();

        return $answer;
    }

    private function askAgain(){
        $this->Printer->Print("Wrong Input! Try again.");
    }

}