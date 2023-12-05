<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Clients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<div class=" container my-5">
    <div class="tittle">
        <center><h3>LIST OF ADMIN</h3></center>
    </div>
    <div class="my-5">
    <div class="mb-3 row">
    <label for="inputId" class="col-sm-1 col-form-label"><h6>ID</h6></label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputId" name="id" required>
    </div>
    <label for="inputName" class="col-sm-1 col-form-label"><h6>Name</h6></label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputName" name="name" required>
    </div>
    <label for="inputSize" class="col-sm-1 col-form-label"><h6>Size</h6></label>
    <div class="col-sm-3">
    
    <select class="form-select" aria-label="Default select example" name="size" id="inputSize">
    
            <option value=""selected>--- Choose your size ---</option>
            <option value="S">S</option>
            <option value="M" >M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="XXL">XXL</option>
    
        </select>
        </div>
    </div>
    <div class="mb-3 row">
            <label for="inputSize" class="col-sm-1 col-form-label"><h6>Choose Image</h6></label>
            <div class="col-sm-3">
            <input class="form-control" type="file" id="image" name="image" required>
            </div>
            <label for="inputquality" class="col-sm-1 col-form-label"><h6>QTY</h6></label>
            <div class="col-sm-3">
            <input class="form-control" id="quality" name="quality" required>
            </div>
            <label for="inputquality" class="col-sm-1 col-form-label"><h6>Price</h6></label>
            <div class="col-sm-3">
            <input class="form-control" id="price" name="price" required>
            </div>
            <label for="inputquality" class="col-sm-1 col-form-label"><h6>Category</h6></label>
            <div class="col-sm-3">
            <input class="form-control" id="category" name="category" required>
            </div>
            </div>
    </div>

    <div class="btn">
        <button type="submit" class="btn btn-primary mb-3 col-sm-15" name="btn-submit" id="btn-submit">Submit</button>
    </div>
</form>
<form action="" method="post" enctype="multipart/form-data">
        <h2>List Of Admin</h2>

        <table class="table" style="text-align: center; align-items: center;">
          
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Quality</th>
                    <th>Image</th>
                    <th>Action</th>    
                </tr>
                <?php
            
            if (isset($_POST["btn-submit"])){
                include("../.vscode/connection.php");
                $id = $_POST['id'];
                $name = $_POST['name'];
                $size = $_POST['size'];
                
                $tname = $_FILES["image"]["tmp_name"];
                $uploads_dir = '../IMAGES/';
                $pname = $_FILES["image"]["name"];

                $quality = $_POST['quality'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                
                if ($id == "" || $name == ""|| $size == ""|| $pname == "" || $price == "" || $quality== ""){  
                }else{
                    $sql = "INSERT INTO `list of client` VALUES('$id', '$name', '$size', '$quality', '$pname', '$category');";
                    $guesttable = "INSERT INTO `guest` VALUES('$id', '$name', '$size', '$category', '$quality','$price', '$pname');";
                    $conn->query($sql);
                    $conn->query($guesttable);
                
                    $sql = "SELECT * FROM `list of client` ORDER BY `id` ASC";
                    $result = $conn->query($sql);
                    move_uploaded_file($tname, $uploads_dir . $pname);
                    if(mysqli_num_rows($result) > 0){

                    foreach ($result as $row){
                        echo "<tr>
                            <td>$row[id]</td>   
                            <td>$row[name]</td>
                            <td>$row[size]</td>
                            <td>$row[quality]</td>
                            <td><img src='../IMAGES/" . $row['image'] . "' alt='' style='width:100px ; height:100px;  alight-items: center; text-alight: center;'></td>
                            <td> 
                                <a class='btn btn-primary btn-sm' href='/web/edit.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='/web/delete.php?id=$row[id]'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                }
                }   

            }      
                ?>
        </table>      
    </div>
    </form>
</body>
</html>