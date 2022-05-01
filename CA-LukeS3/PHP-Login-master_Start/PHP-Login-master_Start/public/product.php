<?php
if (isset($_POST['submit'])) {
    require "../common.php";
    try {
        require_once '../src/DBconnect.php';
        $new_productList = array(
            "productName" => $_POST['productName'],
            "productDescription" => $_POST['productDescription'],
            "price" => $_POST['price']
            "id" => $_Post['id']
        );
        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "productList",
            implode(", ", array_keys($new_productList)),
            ":" . implode(", :", array_keys($new_productList))
        );
        $statement = $connection->prepare($sql);
        $statement->execute($new_productList);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
<?php require "../template/header2.php"; ?>
<?php if (isset($_POST['submit']) && $statement) { ?>
    <?php echo escape($_POST['productName']); ?> successfully added.
<?php } ?>
<form method="post">
    <label for="productName">Product Name</label>
    <input type="text" name="productName" id="productName" required>
    <label for="productDescription">Product Description</label>
    <input type="text" name="productDescription" id="productDescription" required>
    <label for="price">Price €</label>
    <input type="text" name="price" id="price" required>
    <input type="submit" name="submit" value="Submit">
</form>
<a href="index.php">Back to home</a>
<?php require_once '../template/footer2.php';?>
