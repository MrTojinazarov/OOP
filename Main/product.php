<?php
class Product
{
    public $id;
    public $name;
    public $price;
    public $count;
    protected $table = 'product';
    public $con;

    public function __construct($db)
    {
        $this->con = $db;
    }

    public function getAll()
    {
       $sql = "SELECT * FROM $this->table";
       $statement = $this->con->query($sql);
       return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert()
    {
        $sql = "INSERT INTO $this->table (name, price, count) VALUES (:name, :price, :count)";
        $statement = $this->con->prepare($sql);
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->count = htmlspecialchars(strip_tags($this->count));

        $statement->bindParam(':name', $this->name);
        $statement->bindParam(':price', $this->price);
        $statement->bindParam(':count', $this->count);

        if($statement->execute()){
            return 'Created';
        }
        return "error";
    }

    public function delete()
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $statement = $this->con->prepare($sql);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $statement->bindParam(':id', $this->id);

        if($statement->execute()){
            return "Successful";
        }
        return "not deleted";
    }

}

?>