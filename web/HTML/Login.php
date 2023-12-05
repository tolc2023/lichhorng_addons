<?php
if (isset($_POST["btn"])){
    include("../.vscode/connection.php");
    $email = $_POST["email"];
    $password = $_POST["password"];

    $selectadmin = "SELECT * FROM login";
    $rowadmin = $conn->query($selectadmin);
    foreach ($rowadmin as $row){
      if ($row['$Email']==$email && $row['Password']==$password){
        
      }
    }
    
    $selectuser = "SELECT * FROM userlogin";
    $rowuser = $conn->query($selectuser);
    foreach ($rowuser as $row){
      if ($row['emailuser']==$email && $row['passworduser']==$password){
        header("location:../HTML/guest.php");
      }
    }
}
?>

<html 
lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN FORM</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
  
    <form class="form" action="" method="post">
      <div class="container">
      <div class="loin-form">
        <div class="form-group">
        <h5><label for="email">Email</label></h5>
            <input type="email" class="form-control" id="email" name="email" required>
            
            </div>
    
      <div class="form-group">
        <h5><label for="password">Password</label></h5>
          <input type="password" class="form-control" id="" name="password" required>  
             
      </div>
      <div class="button" style="margin-top: 10px;">
        <button type="submit" class="btn" name="btn">Login</button>
        </div>
      </div>
    </div>
    </form>
  
</body>
<script src="../JAVASCRIPTS/login.js"></script>
</html>