<?php
/**
 * Используется метод Абстрактная фабрика которая позволяет
 * создать экземпляры класса  1)BlogAppEncoder и  2)BloggsContactEncoder 3)BloggsTtdEncoder
 * Неаосредственно через класс CommsManeger используя полиморфизм.
 * Экземпляр CommsManeger создается без параметра. Для создания классов блогов(123)
 * используем функцию с параметром make(BlogCommsManager::ХХХ) из класса CommsManeger.
 * унаследованные константы  APPT, TTD, CONTACT  из абстрактного класса CommsManager
 * которые определяют для функции make значение через параметр $flag_int
 *В  методах объекта CommsManeger используется  case(self::xxx) где
 *объект внутри своего класса формирует объекты классов блогов(123)
 * в зависмости от значения переменной $flag_int которая  была передана при
 * візове функции make(BlogCommsManager::ХХХ) из экземпляра CommsManeger.
 *
 * $comms = new BlogCommsManager();
 * $apptEncoder = $comms->make(BlogCommsManager::TTD);
 *
 */

abstract class ApptEncoder
{
    abstract function encode();
}

class BloggsApptEncoder extends ApptEncoder
{
    function encode()
    {
        return "Данные о встрече закодированы в формате BloggsCal \n ";
    }
}

abstract class ContactEncoder
{
    abstract function encode();
}

class BloggsContactEncoder extends ContactEncoder
{
    function encode()
    {
        return "Данные о встрече закодированы в формате ContactCal \n";
    }
}

abstract class TtdEncoder
{
    abstract function encode();
}

class BloggsTtdEncoder extends TtdEncoder
{
    function encode()
    {
        return "Данные о встрече закодированы в формате TtnCal \n";
    }
}

abstract class CommsManager{
    const APPT = 1;
    const TTD = 2;
    const CONTACT = 3;
    abstract function getHeaderText();
    abstract function make($flag_int);
    abstract function getFooterText();

}

class BlogCommsManager extends CommsManager {

  //  private $mode = 0;

//    function __construct($flag_int)
//    {
//        $this->make($flag_int);
//    }


    function getHeaderText(){
        return "BloggsCal верхний колонтитул \n ";
    }

    function make($flag_int) {
        switch ($flag_int) {
            case self::APPT:
                return new BloggsApptEncoder();
            case self::CONTACT:
                return new BloggsContactEncoder();
            case self::TTD:
                return new BloggsTtdEncoder();
        }

    }

    function getFooterText() {
        return "BloggsCal нижний колонтитул \n ";
    }
}

$comms = new BlogCommsManager();
$apptEncoder = $comms->make(BlogCommsManager::TTD);
print $comms->getHeaderText();
print $apptEncoder->encode();
print $comms->getHeaderText();