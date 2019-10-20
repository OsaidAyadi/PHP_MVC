<?php


class Category
{
    private $name;
    private $created;

    /**
     * Category constructor.
     * @param $name
     * @param $created
     */
    public function __construct($name)
    {
        $this->name = $name;

    }

    public function send_category($conn)    {

        $sql = "INSERT INTO categories (name) 
        VALUES ('$this->name')";
        $conn->exec($sql);
        echo "Category is added successfully :)";
    }







}