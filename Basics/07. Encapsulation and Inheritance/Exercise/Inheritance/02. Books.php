<?php
class Book{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;

    /**
     * @var float
     */
    private $price;

    /**
     * Book constructor.
     * @param $title
     * @param $author
     * @param $price
     * @throws Exception
     */
    public function __construct(string $title,string $author,float $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @throws Exception
     */
    public function setTitle($title): void
    {
        if (strlen($title)<3){
            throw new Exception('Title not valid!');
        }
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @throws Exception
     */
    public function setAuthor($author): void
    {
        if (is_numeric(explode(' ',$author)[1][0])){
            throw new Exception('Author not valid!');
        }
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @throws Exception
     */
    public function setPrice($price): void
    {
        if ($price<=0){
            throw new Exception('Price not valid!');
        }
        $this->price = $price;
    }
}
class GoldenEditionBook extends Book{

    function increasePrice(){
        return $this->getPrice()*1.3;
    }
}
$author=readline();
$title=readline();
$price=floatval(readline());
$typeOfBook=readline();

$book=null;

try {
switch ($typeOfBook){

    case "STANDARD":
        $book = new Book($title, $author, $price);
        echo 'OK'."\n";
        echo $book->getPrice();
        break;
    case 'GOLD': $book=new GoldenEditionBook($title, $author, $price);
        echo 'OK'."\n";
        echo $book->increasePrice();
    break;
    default:
        throw new Exception('Type is not valid!');
        break;
    }
}catch(Exception $ex){
    echo $ex->getMessage();
}