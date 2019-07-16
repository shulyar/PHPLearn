<?php

class ShopProduct
{
    public $numPages ;
    public $playLength ;
    public $title = "Стандартны товар";
    private $producerMainName = "Фамлия автора";
    private $producerFirstName = "Имя автора ";
    private $price = 0;

    /**
     * ShopProduct constructor.
     * @param string $title
     * @param string $producerMainName
     * @param string $producerFirstName
     * @param int $price
     */
    public function __construct(string $title, string $producerMainName, string $producerFirstName, int $price, int $numPages, int $playLength)
    {
        $this->title = $title;
        $this->producerMainName = $producerMainName;
        $this->producerFirstName = $producerFirstName;
        $this->price = $price;
        $this->numPages = $numPages;
        $this->playLength = $playLength;
    }

    function getNumberOfPages(){
        return $this->numPages;
    }

    function  getPlayLength(){
        return $this->playLength;
    }

    function getProducer()
    {
        return "{$this->producerFirstName} "
            . "{$this->producerMainName} ";
            //. "{$this->title} "
            //. "{$this->price} ";
    }

    function getPrice()
    {
        return "{$this->price} ";

    }
}
class ShopProductWriter
{
    public function write(shopProduct $shopProduct)
    {
        $str = "{ $shopProduct->title} : "
            . $shopProduct->getProducer()
            . " ({$shopProduct->getPrice()}) \n ";
        print $str;
    }
}

$productl = new ShopProduct("Main campf","Adolph","Hitler",100,20,50);
$wrighter = new ShopProductWriter();
$wrighter->write($productl);
/**productl->title = "Собачье сердце";
$productl->producerMainName ="Булгаков";
$productl->producerFirstName ="Михаил";
$productl->price = 5.99;*/

//print "Автор: {$productl->getProducer()}\n";