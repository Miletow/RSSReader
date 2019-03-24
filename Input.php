<?php
/**
 * Created by PhpStorm.
 * User: Milton
 * Date: 2019-03-23
 * Time: 07:35
 */

namespace RSSReader\Utilities;

class Input
{

    public function getInput()
    {
        $line = readline("Command: ");
        if(readline_add_history($line) == false) {
            throw new Exception("Input not stored.");
        }

        return $line;
    }
}
