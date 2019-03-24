<?php
include 'InterfacePrinter.php';
include 'Questions.php';
include 'Printer.php';
include 'FilePrinter.php';
include 'Arranger.php';
include 'Feed.php';
include 'Input.php';
include 'Menu.php';
include 'ObjectCreator.php';


use RssReader\Utilities\Menu;
use RssReader\Utilities\ObjectCreator;
use RssReader\Utilities\Feed;
use RssReader\Utilities\Arranger;



class RssReader
{

    private $urls = array(
        array(
                "title" => "Scripting News",
                "url" => "http://static.userland.com/gems/backend/rssTwoExample2.xml"
            ),
            array(
                "title" => "BBC",
                "url" => "http://feeds.bbci.co.uk/news/world/rss.xml"
            ),
            array(
                "title" => "CNN",
                "url" => "http://rss.cnn.com/rss/cnn_latest.rss"
            ),
            array(
                "title" => "Fox News",
                "url" => "http://feeds.foxnews.com/foxnews/latest"
            )
    );

    public function __construct()
    {
        $Menu = new Menu();
        $ObjectCreator = new ObjectCreator();
        $Feed = new Feed();
        $Arranger = new Arranger();
        
        $this->setSettings($Menu, $Feed, $Arranger);

        $this->runRssReader($ObjectCreator, $Arranger, $Feed);
    }

    private function setSettings($Menu, $Feed, $Arranger)
    {
        $arrange_setting = $Menu->askArrangeSetting();
        $nr_of_items = $Menu->askNumberOfItems();
        $print_to_file = $Menu->askPrintSetting();
        
        $Arranger->setArrangeSetting($arrange_setting);
        $Feed->setNrOfLines($nr_of_items);

        if($print_to_file == true){
            $file_format = $Menu->askFileformat();
            $Feed->startFilePrinter($file_format);
        }
    }

    private function runRssReader($ObjectCreator, $Arranger, $Feed)
    {
        foreach($this->urls as $url) {
            $object = $ObjectCreator->createObject($url["url"]);
            $object_array = $ObjectCreator->createItemObjectArray($object);
            $sorted_array = $Arranger->arrange($object_array);
            
            $Feed->feed($sorted_array, $url["title"]);
        }
    }

}

