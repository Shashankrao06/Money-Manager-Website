
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Details.css">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    $name =$_SESSION['username'];
    include 'partial/db_connector.php';
    $sql = "select * from expenses where Name='$name'";
    $result= mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    ?>
    <h1>Your expenses are</h1>
    <table border="2" class="table table-dark table-hover" >
      <thead>
        <tr>
          <th>Name</th>
          <th>Amount</th>
          <th>Description</th>
          <th>Date</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
        if($num>0){
          while( $row = mysqli_fetch_assoc($result) ){
            echo
            "<tr>
              <td>{$row['Name']}</td>
              <td>{$row['Amount']}</td>
              <td>{$row['Description']}</td>
              <td>{$row['Date']}</td>
              
            </tr>\n";
          }
        }
        ?>
      </tbody>
    </table>
    <div class="home">
        <a href="newmain.php">Home</a>
    </div>
    
    <!-- <h1>
        
    </h1> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>

