<?php include "../layout/header.php";
include "../../database/database.php";
include "../../model/Product.php";
$conn = new database();
$connection= $conn->conn();

?>

<br/>
<div class="container" style="width: 50%;margin: 0 auto">




<form method="POST"  action="<?php  $_SERVER["PHP_SELF"] ?>">
    <div class="form-group">
        <label for="name">Add product</label>
        <input required type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Product name">
    </div>

    <div class="form-group">
        <label for="des">Description</label>
        <input required type="text" name="description" class="form-control" id="des" aria-describedby="emailHelp" placeholder="Description">
    </div>


    <div class="form-group">
        <label for="price">Price</label>
        <input required type="number" name="price" class="form-control" id="price" aria-describedby="emailHelp" placeholder="Price">
    </div>

    <div class="form-group">


        <label for="category_id">Categories</label>


        <select name="category_id" class="form-control" id="Categories">


            <?php
            $sql = "SELECT name,id FROM categories";
            $q = $connection->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);

                 foreach ($q as $row)  {   ?>
                <option value=<?php echo htmlspecialchars($row['id']) ?>>
                    <?php echo htmlspecialchars($row['name']) ?>
                </option>
            <?php } ?>


        </select>
    </div>


    <button name="submit" type="submit" class="btn btn-warning">Submit</button>
</form>
</div>

<?php
if (isset($_POST['submit'])) {

 $product = new Product
 (htmlspecialchars($_POST['name']),htmlspecialchars($_POST['description']),htmlspecialchars($_POST['price']),htmlspecialchars($_POST['category_id']));


    $product->sendProduct($connection);


}

?>

<?php include "../layout/footer.php"; ?>
