<?php

// // class 1

// class car
// {

//     public $color;
//     public $price;
//     public $year;

//     public function show(){
//         echo 'Color: ' .$this->color .', Price: ' . $this->price . ', Year: ' . $this->year;
//     }

// }
// $bmw = new car();
// $bmw->color = "Black";
// $bmw->price = 20000;
// $bmw->year = 2010;
// $bmw->show();

// // class 2

// echo '<br> <hr>';

// class Tavar
// {

//     public $soni;
//     protected $narxi;
//     private $summ;

//     public function setPrice($price){
//         $this->narxi = $price;
//     }

//     public function hisob(){
//         $this->summ = 'Soni: ' . $this->soni . ', Narxi: ' . $this->narxi . ', Summasi: ' . ($this->soni * $this->narxi);
//         return $this->summ;
//     }


// }


// $product = new Tavar();
// $product->soni = 5;
// $product->setPrice(1000);
// echo $product->hisob();

// // class 3
// echo '<br> <hr>';


// class Product
// {
//     public $name;
//     public $price;
// }

// class Phone extends Product
// {

//     public $color;
//     public $memory;

//     public function show(){

//         return 'Name: ' .$this->name . ", Price: " . $this->price . ", Color: " . $this->color . ", Memory: " . $this->memory;
//     }

// }

// $phone = new Phone();
// $phone->name = "Samsung";
// $phone->price = "1200$";
// $phone->color = 'Titanium';
// $phone->memory = '1TB';

// echo $phone->show();

// // class 4
// echo '<br> <hr>';


// class Product1
// {
//     public $name;
//     protected $price;

//     public function setPrice($price){
//         $this->price = $price;
//     }
// }

// class Phone1 extends Product1
// {

//     public $color;
//     public $memory;

//     public function show(){

//         return 'Name: ' .$this->name . ", Price: " . $this->price . ", Color: " . $this->color . ", Memory: " . $this->memory;
//     }

// }

// $phone = new Phone1();
// $phone->name = "Samsung";
// $phone->setPrice('1400$');
// $phone->color = 'Titanium';
// $phone->memory = '1TB';

// echo $phone->show();

// databazaga ulanish

include 'database.php';
include 'product.php';

$db = new Database();
$product = new Product($db->connection());
$products = $product->getAll();

if(isset($_POST['ok'])){
    if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['count'])){
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->count = $_POST['count'];
        $product->insert();

    }
}

if(!empty($_GET['id'])){

    $product->id = $_GET['id'];
    $product->delete();
    header("Location: index.php");

}    


?>

<form action="index.php" method="POST">
    <input type="text" name="name"  placeholder="Name"><br>
    <input type="number" name="price"  placeholder="Price"><br>
    <input type="number" name="count"  placeholder="Count"><br>
    <input type="submit" name="ok" value="Ok">
</form>


<table border="1" width = "80%" align="center">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>COUNT</th>
        <th>DELETE</th>
    </tr>
    <?php
    foreach($products as $product){ ?>

    <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['name'] ?></td>
        <td><?= $product['price'] ?></td>
        <td><?= $product['count'] ?></td>
        <td><a href="index.php?id=<?=$product['id']?>">delete</a></td>
    </tr>
        <?php } ?>
</table>
