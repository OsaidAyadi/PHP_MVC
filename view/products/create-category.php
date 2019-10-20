<?php include "../layout/header.php" ;
include "../../database/database.php";
include "../../model/Category.php";
$conn = new database();
$connection = $conn->conn();

?>
<br/>

<div class="container" style="width: 50%;margin: 0 auto">




    <form method="POST"  action="<?php  $_SERVER["PHP_SELF"] ?>">

        <div class="form-group">
            <label for="category">Add category</label>
            <input  type="text" name="category" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Category name">
        </div>

        <button name="submit" type="submit" class="btn btn-warning">Submit</button>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $category = new Category($_POST['category']);
    $category->send_category($connection);


}

?>


<?php include "../layout/footer.php"?>
