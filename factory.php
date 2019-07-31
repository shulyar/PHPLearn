<?php
/**
 * Используется метод фабрика которая позволяет
 * создать экземпляры класса  BlogAppEncoder и  MegaApptEncoder
 * Неаосредственно через класс CommsManeger используя полиморфизм.
 * При создании нового объекта CommsManeger в параметрах указывается
 * константа неизменяемая переменная BLOGGS или MEGA которая определяет
 * для приватной переменной $mode значение в магической функции __construct
 *В  методах объекта CommsManeger используется  case(self::xxx) где
 *объект внутри своего класса формирует объекты классов BlogAppEncoder и
 *BlogAppEncoder в зависмости от значения переменной $mode которая ранее была
 * определена.Переменная $mode позволяет зафиксировать параметр
 * при создании єкземпляра класса  CommsManager для дальнейшего создания
 * єкземпляра класса MegaApptEncoder без указания параметров в методе создания
 * getApptEncoder()
 *
 * $comms = new CommsManager(CommsManager::BLOGGS);
 *  $apptEncoder = $comms->getApptEncoder();
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
class MegaApptEncoder extends ApptEncoder
{
    function encode()
    {
        return "Данные о встрече закодированы в формате MegaCal \n ";
    }
}

class CommsManager
{
    const BLOGGS = 1;
    const MEGA = 2;
    private $mode = 1;

    function __construct($mode)
    {
        $this->mode = $mode;
    }

    function getHeaderText()
    {
        switch ($this->mode) {
            case(self::MEGA):

                return "MegaCal верхний колонтитул \n";
            default:
                return "BloggsCal верхний колонтитул \n";
        }
    }

    function getApptEncoder()
    {
        switch ($this->mode) {
            case(self::MEGA):
                return new MegaApptEncoder();
            default:
                return new BloggsApptEncoder();
        }
    }
}
$comms = new CommsManager(CommsManager::BLOGGS);
$apptEncoder = $comms->getApptEncoder();
print  $apptEncoder->encode();
$apptEncoder1 = $comms->getHeaderText();
print  $apptEncoder1;