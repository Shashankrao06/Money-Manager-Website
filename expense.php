<?php
    session_start();
    $name=$_SESSION['username'];
    // echo $name;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $error=false;
        $showAlert=true;
        include 'partial/db_connector.php';
        
        
        
        $amount= $_POST["amount"];
        $description= $_POST["description"];
        $exists=false;
        
        
        
        if($exists==false){
            $sql="INSERT INTO `expenses`(`Name`, `Amount`, `Description`) VALUES ('$name','$amount','$description')";
            $result=mysqli_query($conn,$sql);
            if($result){
                $error=true;
            }
            else{
                $showAlert= "Try with different username";
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="expense.css"> -->
    <link rel="stylesheet" href="ep2.css">
    <script src="expense.js"></script>
    <title>Document</title>
</head>
<body>
<div class="wrapper">
         <div class="title">
            Expenses
         </div>
         <form action="expense.php" method="post">
            <div class="field">
               <input type="text" id="amount" name="amount" required>
               <label>Amount</label>
            </div>
            <div class="field">
               <input type="text" id="description" name="description"  required>
               <label>Description</label>
            </div>
            
            <div class="field">
               <input type="submit" value="Add" onclick="alertf()" >
            </div>
            <div class="pass-link">
                  <a href="newmain.php" onclick="popup()">Home</a>
               </div>
         </form>
      </div>
      <script>
          popup(){
              alert("Logout Is Successful");
          }
      </script>
    <!-- <h1>Add your expense details here</h1>
  
    <h1>Write your expenses details here</h1>
<div class="form">
    <form action="expense.php" method="post">
    
    <label for="amount">Amount</label>
    <input type="text" id="amount" name="amount">
    <label for="description">Description</label>
    <input type="text" id="description" name="description">
    <button type="submit" class="btn btn-primary">Signup</button>
    <a href="newmain.php">home</a>
</form>
</div> -->



</body>
</html>