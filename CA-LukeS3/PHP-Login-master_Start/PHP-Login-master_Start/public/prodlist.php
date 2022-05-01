<?php
try {
require "../common.php";
require_once '../src/DBconnect.php';
$sql = "SELECT * FROM productlist";
$statement = $connection->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();
} catch (PDOException $error) {
echo $sql . "<br>" . $error->getMessage();
}?>
<?php require "../template/header.php"; ?>
    <title>Products page</title>
    </head>


    <body>
<div class="container">
    <div class="header clearfix">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contacts.php">Contact</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">PHP Login exercise - Products page</h3>
    </div>

    <div class="mainarea">
        <h2>Product List</h2>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row) : ?>
                <tr>
                    <td><?php echo escape($row["productID"]); ?></td>
                    <td><?php echo escape($row["productName"]); ?></td>
                    <td><?php echo escape($row["productDescription"]); ?></td>
                    <td><?php echo escape($row["price"]); ?></td>
                    <td><a href="updateproducts.php?id=<?php echo escape($row["productID"]);
                        ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php">Back to home</a>

    </div>

    <div class="row marketing">
        <div>
            <h4>Contacts page</h4>
            <p>Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. </p>

        </div>

<?php require_once '../template/footer.php';?>