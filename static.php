<?php
/**
 * Created by PhpStorm.
 * User: shulyar
 * Date: 16.07.2019
 * Time: 17:17
 */
class StaticExample
{
static public $aNum = 0;
static public function sayHello(){
    print " Привет ! " ;
}
}
print StaticExample::$aNum;
StaticExample::sayHello();