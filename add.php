<?php
include 'inc/header.php'; 
include 'classes/Database.php'; 
include 'classes/Product.php'; 

$database = new Database();
$db = $database->getConnection();
$product = new Product($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    $product->description = $_POST['description'];

    // Handle image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $product->image = $target_file;
    }

    if ($product->create()) {
        echo "<p>Product added successfully!</p>";
    } else {
        echo "<p>Error adding product.</p>";
    }
}
?>


<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">


            <form>
                <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name = "name">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "desc"></textarea>
                </div>

                <div class="mb-3">
                <label for="formFile" class="form-label">Image:</label>
                <input class="form-control" type="file" id="formFile" name="img">
                </div>

                <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>