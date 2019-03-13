<?php

class Arranger{

    private $arrange_setting;

    public function arrange($source){

        switch($this->arrange_setting){
            case "date":
            return $this->arrangeByDate($source);
            break;

            case "title":
            return $this->arrangeAlphabetical($source);
            break;
            
            default:
            exit();
        }
    }

    public function setArrangeSetting($setting){
        $this->arrange_setting = $setting;
    }


    private function arrangeAlphabetical($source){

        usort($source, function($a, $b){
            return strcmp($a->title, $b->title);
        });

        return $source;
    }


    private function arrangeByDate($source){

        usort($source, function($a, $b)
            {
                $date1 = strtotime($a->pubDate);
                $date2 = strtotime($b->pubDate);
                if ($date1 < $date2) return 1;
                if ($date1 == $date2) return 0;
                if ($date1 > $date2) return -1;
            });

        return $source;       
    }
}