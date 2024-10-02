<?php
class Students
{
    public $id;
    public $fio;
    public $phone;
    public $manzil;
    public $photo;
    protected $table = 'students'; 
    public $con;

    public function __construct($db)
    {
        $this->con = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        $statement = $this->con->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert()
    {
        $sql = "INSERT INTO {$this->table} (fio, phone, manzil, photo) VALUES (:fio, :phone, :manzil, :photo)";
        $statement = $this->con->prepare($sql);

        $this->fio = htmlspecialchars(strip_tags($this->fio));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->manzil = htmlspecialchars(strip_tags($this->manzil));
        $this->photo = htmlspecialchars(strip_tags($this->photo));

        $statement->bindParam(':fio', $this->fio);
        $statement->bindParam(':phone', $this->phone);
        $statement->bindParam(':manzil', $this->manzil);
        $statement->bindParam(':photo', $this->photo);

        if ($statement->execute()) {
            return $this->con->lastInsertId(); 
        }
        return "Error: " . implode(":", $statement->errorInfo()); 
    }

    public function delete()
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $statement = $this->con->prepare($sql);

        $this->id = htmlspecialchars(strip_tags($this->id));
        if (!is_numeric($this->id)) {
            return "Invalid ID";
        }

        $statement->bindParam(':id', $this->id);

        if ($statement->execute()) {
            return "Deleted successfully";
        }
        return "Error: " . implode(":", $statement->errorInfo()); 
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET fio = :fio, phone = :phone, manzil = :manzil, photo = :photo WHERE id = :id";
        
        $statement = $this->con->prepare($sql);

        $this->fio = htmlspecialchars(strip_tags($this->fio));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->manzil = htmlspecialchars(strip_tags($this->manzil));
        $this->photo = htmlspecialchars(strip_tags($this->photo));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $statement->bindParam(':fio', $this->fio);
        $statement->bindParam(':phone', $this->phone);
        $statement->bindParam(':manzil', $this->manzil);
        $statement->bindParam(':photo', $this->photo);
        $statement->bindParam(':id', $this->id);

        if ($statement->execute()) {
            return 'Updated successfully';
        }

        return 'Update failed';
    }

    public function getStudentById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
?>
