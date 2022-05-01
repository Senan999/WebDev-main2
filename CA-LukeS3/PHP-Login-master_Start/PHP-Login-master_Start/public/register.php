<?php
        require_once '../src/DBconnect.php';
       session_start();

       if(isset($_SESSION['user'])){
           header("index.php");
       }

       if(isset($_REQUEST['register_btn'])){

           echo "<pre>";
                print_r($_REQUEST);
           echo "</pre>";


           $name = filter_var($_REQUEST['name'],FILTER_SANITIZE_STRING);
           $email = filter_var(strtolower($_REQUEST['email']),FILTER_SANITIZE_EMAIL);
           $password = strip_tags($_REQUEST['password']);

           if(empty($name)){
               $errorMsg[0][] = "Name Required";
           }
           if(empty($email)){
               $errorMsg[1][] = "Email Required";
           }
           if(empty($password)){
               $errorMsg[2][] = "Password Required";
           }
           if(strlen($password) < 6){
               $errorMsg[2][] = 'Must be at least 6 characters';
           }

         if(empty($errorMsg)){
             try{
                 $select_stmt = $connection->prepare("SELECT name, email FROM login WHERE email = :email");
                 $select_stmt->execute([':email'=>$email]);
                 $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

                 if(isset($row['email']) == $email){
                     $errorMsg[1][] = "Email already registered";
                 }else{



                     $insert_stmt = $connection->prepare("INSERT INTO login (name,email,password) VALUES (:name,:email,:password)");

                     if(
                         $insert_stmt->execute(
                                 [
                                         ':name' => $name,
                                     ':email' => $email,
                                     ':password' => $password
                                 ]
                         )
                     ){
                         header("location: login.php?msg=".urlencode('Login now'));
                     }
                 }

             }catch(PDOException $e){
                 $pdoError = $e->getMessage();
             }
         }

       }
?>
<?php require "../template/header2.php"; ?>

    body>
    <div class="container">

        <form action="register.php" method="post">
            <div class="mb-3">
                <?php
                    if(isset($errorMsg[0])){
                        foreach($errorMsg[0] as $nameErrors){
                            echo "<p class='small text-danger'>".$nameErrors."</p>";
                        }
                    }
                ?>
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Jane Doe">
            </div>
            <div class="mb-3">
                <?php
                if(isset($errorMsg[1])){
                    foreach($errorMsg[1] as $emailErrors){
                        echo "<p class='small text-danger'>".$emailErrors."</p>";
                    }
                }
                ?>
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="jane@doe.com">
            </div>
            <div class="mb-3">
                <?php
                if(isset($errorMsg[2])){
                    foreach($errorMsg[2] as $passwordErrors){
                        echo "<p class='small text-danger'>".$passwordErrors."</p>";
                    }
                }
                ?>
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="">

            </div>
            <button type="submit" name="register_btn" class="btn btn-primary">Register Account</button>
        </form>
        Already Have an Account? <a class="register" href="login.php">Login Instead</a>
    </div>
    </body>
    <a href="index.php">Back to home</a>
<?php require_once '../template/footer2.php';?>