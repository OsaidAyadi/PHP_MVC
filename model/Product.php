<?php

class Product
{
    private $name;
    private $description;
    private $price;
    private $category_id;

    /**
     * Product constructor.
     * @param $name
     * @param $description
     * @param $price
     * @param $category_id
     */
    public function __construct($name, $description, $price, $category_id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
    }





    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function sendProduct ($conn) {

        $sql = "INSERT INTO products ( name, description , price, category_id)
 VALUES ('$this->name', '$this->description', $this->price, $this->category_id)";
        $conn->exec($sql);
        echo "New record created successfully ^_^";


    }


    public function all_category($conn){
        $sql = "SELECT id,name,description,price,created FROM products";
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($q as $row){
            $result[]=$row;
        }

        return $result;
    }

    public function delete_row ($conn,$id) {
        $sql = "DELETE FROM products WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

    }



}