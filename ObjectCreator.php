<?php

namespace RSSReader\Utilities;

class ObjectCreator
{

    public function createObject($source)
    {
        $object = simplexml_load_file($source);

        if($object == false) {
            throw new Exception("Error loading rss source.");
        }

       return $object;
    }

    public function createItemObjectArray($Object)
    {
        $ObjectArray = array();

        foreach($Object->channel->item as $item) {
            
            array_push($ObjectArray, $item);
        }

        return $ObjectArray;
    }
}