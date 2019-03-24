<?php
/**
 * Created by PhpStorm.
 * User: Milton
 * Date: 2019-03-23
 * Time: 07:38
 */

namespace RSSReader\Interfaces;

interface Questions
{
    public function askArrangeSetting();
    public function askNumberOfItems();
    public function askPrintSetting();
    public function askFileformat();

}
