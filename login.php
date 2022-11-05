<?php
  $login=false;
  $showerror= false;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $error=false;
        $showAlert=true;
        include 'partial/db_connector.php';
        $username= $_POST["username"];
        $password= $_POST["password"];
        
        $sql = "Select * from login where username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
          $login=true;
          session_start();
          $_SESSION['username']=$username;
          $_SESSION['password']=$password;
          
          header("location: newmain.php");
        }
        else{
          $showerror =true;
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <title>Document</title>
</head>

<body>
    <?php
      if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Logged in Successfully</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      if($showerror){
        echo '<script> alert("Invalid credentials Try agian") </script>';
      }
      ?>
      
  <form id="form" action="login.php" method="post">
      <h3>Login here</h3>
      <div class="username">
      <label for="username">Username</label>
    <input type="text" id="username" name="username">
    </div>
    <div class="password">
      <label for="password">Passwords
      </label>
      <input type="password" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">LogIn</button>  
  </form>
  </body>
  

</html>