<?php
require "../common.php";
if (isset($_POST['submit'])) {
    try {
        require_once '../src/DBconnect.php';
        $product =[
            "productID" => $_POST['productID'],
            "productName" => $_POST['productName'],
            "productDescription" => $_POST['productDescription'],
            "price" => $_POST['price']
        ];
        $sql = "UPDATE productList
 SET productID = :productID,
 productName = :productName,
 productDescription = :productDescription,
 price = :price,
 WHERE productID = :productID";
        $statement = $connection->prepare($sql);
        $statement->execute($product);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
if (isset($_GET['productID'])) {
    try {
        require_once '../src/DBconnect.php';
        $productID = $_GET['productID'];
        $sql = "SELECT * FROM productList WHERE productID = :productID";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':productID', $productID);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
    echo "Something went wrong!";
    exit;
}
?>
<?php require "../template/header2.php"; ?>
<?php if (isset($_POST['submit']) && $statement) : ?>
    <?php echo escape($_POST['productName']); ?> successfully updated.
<?php endif; ?>
<h2>Edit a product</h2>
<form method="post">
    <?php foreach ($product as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key;
        ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'productID' ?
            'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>
<a href="index.php">Back to home</a>
<?php require "../template/footer2.php"; ?>
