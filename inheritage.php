<?php
/**
 * Наследование
 * Есть общий клас ShopProduct
 * Два дочерних класса CDProduct, BookProduct
 * В дочерние классы добавлены разные по типу товара дополнительные
 * атрибуты : $playLength длина звучания и $numPages количество страниц
 * И функция __construct() в дочерних объектах заполняется с учнтом дополнительного
 * атрибута с указанием ниже parent::__construct() что ссылается на родительский
 * конструуктор только с его атрибутами.
 * Также создается одноименная функция getSummaryLine() для вывода дополнительных атрибутов
 * дочерних клакссов, также она может присутствовать и в родительском.
 *
 * В дальнейшем работа по созданию книг и СД экземпляров(объектов) идет
 *через объявление экземпляров дочерних унаследованных класов от общего
 *
 * $product1 = new BookProduct("Алиса","Керрол","Льюис",250,200);
 * $product2 = new CDProduct("Аквариум","Гребеньщеков","Борис",150,30);
 *
 *Атрибуты доступны через protected, что распространяется на дочерние классы
 */
class ShopProduct
{


    protected $title = "Стандартны товар";
    protected $producerMainName = "Фамлия автора";
    protected $producerFirstName = "Имя автора ";
    protected $price = 0;
    protected $discount = 0;
    /**
     * ShopProduct constructor.
     * @param string $title
     * @param string $producerMainName
     * @param string $producerFirstName
     * @param int $price
     */
    public function __construct(string $title, string $producerMainName, string $producerFirstName, int $price)//, int $numPages=null, int $playLength=null)
    {
        $this->title = $title;
        $this->producerMainName = $producerMainName;
        $this->producerFirstName = $producerFirstName;
        $this->price = $price;
       // $this->numPages = $numPages;
       // $this->playLength = $playLength;
    }



    function getProducer()
    {
        return "{$this->producerFirstName} "
            . "{$this->producerMainName} ";
    }

    function getSummaryLine(){
        $base = "$this->title ( {$this->producerMainName})";
        $base .= "{$this->producerFirstName}";
        return $base;
    }


}

class CDProduct extends ShopProduct
{
    protected $playLength ;

    function __construct(string $title, string $producerMainName, string $producerFirstName, int $price,int $playLength)
    {
        parent::__construct($title, $producerMainName, $producerFirstName, $price);
        $this->playLength = $playLength;
    }

    function getPlayLength()
    {
        return $this->playLength;
    }

    function getSummaryLine()
    {
        $base = "$this->title ( {$this->producerMainName})";
        $base .= "{$this->producerFirstName}";
        $base .= ": Время звучания {$this->playLength}";
        return $base;
    }
}
class BookProduct extends ShopProduct
{
    protected $numPages ;

    function __construct(string $title, string $producerMainName, string $producerFirstName, int $price,int $numPages)
    {
        parent::__construct( $title,  $producerMainName,  $producerFirstName,  $price);
        $this->numPages = $numPages;
    }


    function getNumPages()
    {
        return $this->numPages;
    }

    function getSummaryLine()
    {
        $base = "$this->title ( {$this->producerMainName})";
        $base .= "{$this->producerFirstName}";
        $base .= ": Количество страниц {$this->numPages}";
        return $base;
    }
}
$product1 = new BookProduct("Алиса","Керрол","Льюис",250,200);


$product2 = new CDProduct("Аквариум","Гребеньщеков","Борис",150,30);
$product3 = new ShopProduct("Кино","Цой","Виктор",350);

print "Автор {$product1->getSummaryLine()}\n";
print "Исполнитель {$product2->getSummaryLine()}\n";
//print $product3->price;
