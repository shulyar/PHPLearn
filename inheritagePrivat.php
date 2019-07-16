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
 *Атрибуты закрыты через privat, что требует обращения из дочерних
 * классов к родителю через parent::getSummaryLine() функцию что
 * собирается в родителе.
 */
class ShopProduct
{


    private $title = "Стандартны товар";
    private $producerMainName = "Фамлия автора";
    private $producerFirstName = "Имя автора ";
    private $price = 0;
    private $discount = 0;
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

    /**
     * @return string
     */
    public function getProducerMainName(): string
    {
        return $this->producerMainName;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getProducerFirstName(): string
    {
        return $this->producerFirstName;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getDiscount(): int
    {
        return $this->discount;
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
    private $playLength ;

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
        $base = parent::getSummaryLine();

        $base .= ": Время звучания {$this->playLength}";
        return $base;
    }

}
class BookProduct extends ShopProduct
{
    private $numPages ;

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
        $base = parent::getSummaryLine();

        $base .= ": Количество страниц {$this->numPages}";
        return $base;
    }
}
$product1 = new BookProduct("Алиса","Керрол","Льюис",250,200);


$product2 = new CDProduct("Аквариум","Гребеньщеков","Борис",150,30);
$product3 = new ShopProduct("Кино","Цой","Виктор",350);

print "Автор {$product1->getSummaryLine()}\n";
print "Исполнитель {$product2->getSummaryLine()}\n";
print $product3->getProducerFirstName();
