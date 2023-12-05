<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Page</title>
    <link href="" rel="stylesheet">
   
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        background-color: antiquewhite;
        width: 100%;
        height: 100vh;
    }
    .product{
        padding: 20px;
        float: left;
        
    }
    .box-product{
        width: 210px;
        height: 300px;
        text-align: center;
        align-items: center;
        background-color: #eeeee6;
        border-radius: 20px;
        box-shadow: 10px 10px 10px lightslategray;
       
        
    }
    .box-product .image img{
        width: 200px;
        height: 150px;
        text-align: center;
        align-items: center;
        padding: 10px;
        border-radius: 20px;
        box-shadow: 1px 1px 1px  lightcoral;
    }
    
.line .title{
    width: 70px;
    height: 30px;
    background-color: crimson;
    text-align: center;
    align-items: center;
    padding: 5px;
    color: white;
    font-size: 20px;
}
.line_hr hr{
    background-color: crimson;
    height: 4px;
}
.cloths{
    margin-left: 25px;
    display: flex;
}
.name{
    text-align: left;
}
.name label{
    display: block;
}
.name span{
    font-weight: bold;
    font-size: 18px;
}
.name a{
    text-decoration: none;
    display: flow-root;
    align-items: center;
    margin: auto;
    margin-top: 50px;
    border-radius: 5px;
    width: 75px;
    height: 25px;
    background-color: white;
    text-align: center;
}
.name a:active{
    background-color: aqua;
    color: aliceblue;
}
.name a:hover{
    border-color: greenyellow;
    color: black;
    transform: rotate(360deg);
    transition: 2s ease;
}
.image img:hover{
    transform: scale(1, 1.2);
    transition: 2s ease;    
}
.Shoes{
    display: flex;
    margin-left: 25px;
}
.scroll_cloth{
    overflow-x: scroll;
}
.scroll_data{
    overflow-x: scroll;
}

.lineShoes{
    display: block;
}
.lineShoes .title{
    display: flex;
    width: 70px;
    height: 30px;
    background-color: crimson;
    text-align: center;
    align-items: center;
    padding: 5px;
    color: white;
    font-size: 20px;
}
.lineShoes hr{
    background-color: crimson;
    height: 4px;
}
</style>

<body>  
        <div class="container my-5">
            <div class="header">
                <center><h2>List of Products</h2></center>
            </div>
            <div class="line">
                <div class="title" id="cloth">T-shirt</div>
                <div class="line_hr">
                    <hr>
                </div>
            </div>
            <div class="scroll_cloth">
            <div class="cloths">
                    <?php
                       include("../.vscode/connection.php");
                        $products = "SELECT * FROM `guest` WHERE `category` LIKE 'cloth' AND quality > 0";
                        $data = $conn->query($products);
                        foreach($data as $row) {
                            ?>
                        <div class="product">
                            <div class="box-product">
                                <div class="image">
                                <img src="../IMAGES/<?php echo $row['image'];?>">
                                </div> 
                                <div class="name" >
                                    <label for="" ><span>Name:&nbsp;</span><?php echo $row['name']?></label> 
                                    <label for="" ><span>Price:&nbsp;</span><?php echo $row['price']?></label><br/> 
                                    <a type="submit" href="../HTML/guest.php?id=<?php echo $row['id']?>" class="add-cart">Add Cart</a>
                                </div>
                                
                            </div>
                        </div>  
                    <?php
                        };
                    ?>
            </div>
            </div>
            <div class="lineShoes">
                <div class="title" id="shoes">Shoes</div>
                <div class="line_hr">
                    <hr>
                </div>
            </div>
            <div class="scroll_data">
            <div class="Shoes">
            <?php
                       include("../.vscode/connection.php");
                        $products = "SELECT * FROM `guest` WHERE `category` LIKE '%SHOES%' AND quality > 0";
                        $data = $conn->query($products);
                        foreach($data as $row) {
                            ?>
                        <div class="product">
                            <div class="box-product">
                                <div class="image">
                                <img src="../IMAGES/<?php echo $row['image'];?>">
                                </div> 
                                <div class="name" >
                                    <label for="" ><span>Name:&nbsp;</span><?php echo $row['name']?></label> 
                                    <label for="" ><span>Price:&nbsp;</span><?php echo $row['price']?></label><br/> 
                                    <a type="submit" href="" class="add-cart">Add Cart</a>
                                </div>
                                
                            </div>
                        </div>  
                    <?php
                        };
                    ?>
            </div>
            </div>
        </div>
</body>
</html>