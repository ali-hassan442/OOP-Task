<?php
include 'classes/Database.php';
include 'classes/Product.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();
    $product = new Product($db);
    $product->id = $_GET['id'];

    if ($product->delete()) {
        echo "<p>Product deleted successfully.</p>";
    } else {
        echo "<p>Error deleting product.</p>";
    }
}

header('Location: index.php');
?>
