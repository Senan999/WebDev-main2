<?php
require_once ('../src/DBconnect.php');
session_start();
if(isset($_SESSION['user'])){
    header("location: index.php");
}

if(isset($_REQUEST['login_btn'])){
    $email = filter_var(strtolower($_REQUEST['email']),FILTER_SANITIZE_EMAIL);
    $password = strip_tags($_REQUEST['password']);
    var_dump($email,$password);
    if(empty($email)){
        $errorMsg[]='Must Enter Email';
    }elseif (empty($password)){
        $errorMsg[]='Must Enter Password';
    }


    else{
        try{
            $select_stmt = $connection->prepare("SELECT * from login WHERE email = :email AND password = :password LIMIT 1");
            $select_stmt->execute([
                    ':email' => $email,
                    ':password' =>$password
                ]
            );
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

            if($select_stmt->rowCount() > 0){


                    $_SESSION['user']['name'] = $row["name"];
                    $_SESSION['user']['email'] = $row["email"];
                    $_SESSION['user']['id'] = $row["id"];

                    header("location: index.php");


            }
            else{
                $errorMsg[] = 'Wrong email ';
            }

        }
        catch(PDOException $e){
            echo $e->getMessage();
        }


    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../css/signin.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    <title>Sign in</title>
</head>

<body>



<body>
<div class="container">
    <?php
    if(isset($errorMsg)){
        foreach($errorMsg as $loginError){
        echo "<p class='alert alert-danger'>".$loginError."</p>";
        }
    }
    ?>
    <form action="login.php" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="jane@doe.com">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <li>
            <a href="register.php"><strong>Create Login</strong></a> - add a user login
        </li>
        <button name="login_btn" value="Login" class="button" type="submit">Sign in</button>

    </form>


</div>
</body>
</html>
