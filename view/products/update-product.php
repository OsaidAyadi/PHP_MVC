<?php include "../layout/header.php" ;
include "../../database/database.php";
include "../../model/Category.php";
include "../../model/Product.php";
$conn = new database();
$connection = $conn->conn();
$q = new Product("Test","","","");
$result= $q->all_category($connection);


?>

<style>
    .custab{
        border: 1px solid #ccc;
        padding: 5px;
        margin: 5%;
        box-shadow: 3px 3px 2px #ccc;
        transition: 0.5s;
    }
    .custab:hover{
        box-shadow: 3px 3px 0px transparent;
        transition: 0.5s;
    }
</style>

<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
        <table class="table table-striped custab" >
            <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Created</th>
                <th class="text-center">Action</th>

            </tr>
            </thead>


                <?php
                foreach ($result as $row)
                 {   ?>
            <tr>
                    <td>
                    <?php echo htmlspecialchars($row['id']) ?>
                    </td>
            <td>
                <?php echo htmlspecialchars($row['name']) ?>
            </td>
            <td>
                <?php echo htmlspecialchars($row['description']) ?>
            </td>
            <td>
                <?php echo htmlspecialchars($row['price']) ?>
            </td>
            <td>
                <?php echo htmlspecialchars($row['created']) ?>
            </td>
                <td class="text-center"><button class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                    <button  class="btn btn-danger btn-xs"
                       name="delete" value="delete">
                        <?php
                        ?>
                        <span class="glyphicon glyphicon-remove"></span>
                        Del</button>
                </td>
            </tr>
                <?php }





                ?>






        </table>
    </div>
</div>



<?php include "../layout/footer.php"?>
