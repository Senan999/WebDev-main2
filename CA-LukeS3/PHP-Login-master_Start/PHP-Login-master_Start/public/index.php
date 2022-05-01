<?php require_once '../template/header.php';?>
<title>Home page</title>
</head>


<body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contacts.php">Contact</a></li>
              <li><a href="prodlist.php">View Products</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">PHP Login exercise - Home page</h3>
      </div>

        <div class="mainarea">
            <h1>Status: You are logged in  <?php echo $_SESSION['user']['name'];?> </h1>
            <p class="lead">This is where we will put the logout button</p>

            <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
                <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
            </form>
        </div>
        <ul>
            <li>
                <a href="create.php"><strong>Create</strong></a> - add a user
            </li>
            <li>
                <a href="read.php"><strong>Read</strong></a> - find a user
            </li>
            <li>
                <a href="update.php"><strong>Update</strong></a> - edit a user
            </li>
            <li>
                <a href="delete.php"><strong>Delete</strong></a> - delete a user
            </li>
            <li>
                <a href="register.php"><strong>Create Login</strong></a> - add a user login
            </li>
            <li>
                <a href="product.php"><strong>Product</strong></a> - add a product
            </li>
        </ul>

      <div class="row marketing">
        <div>
          <h4>Home page</h4>
          <p>Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. Some content goes here. </p>

       </div>

          <?php require_once '../template/footer.php';?>
