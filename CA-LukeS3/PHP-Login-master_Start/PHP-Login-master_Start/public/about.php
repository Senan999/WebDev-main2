<?php require_once '../template/header.php';?>
  
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
        <h3 class="text-muted">PHP Login exercise - About page</h3>
      </div>

        <div class="mainarea">
            <h1>Status: You are logged in  <?php echo $_SESSION['user']['name'];?> </h1>
            <p class="lead">This is where we will put the logout button</p>

            <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
                <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
            </form>
        </div>

      <div class="row marketing">
        <div>
          <h4>About page</h4>
          <p>About us. We are a family owned and run tech shop specialising in gaming peripherals. 

              The main motivation behind our store is the lack of one central location to easily browse and compare gaming peripherals. There is nothing more annoying as a customer than buying a product and a week later finding out that you could have bought something much better at a cheaper price. </p>

       </div>

          <?php require_once '../template/footer.php';?>
