<?php
session_start();
if(isset($_SESSION['email'])){
include 'connection.php';
$email=$_SESSION['email'];
$select="SELECT * FROM `userlogin` WHERE email='$email'";
$real_select=mysqli_query($result,$select);
$real_select_array=mysqli_fetch_assoc($real_select);
}else{
    header('location:http://localhost/projects/project2/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <link rel="stylesheet" href="userpage.css">
</head>
<body>
    <div class="cart-container">
        <div class="cart-head">
            <a href="userpage.php"><i class="fas fa-arrow-left"></i></a>
       <div class="cart-user">
        <h1><?php echo $real_select_array['name'];?></h1>
        <img src="<?php echo $real_select_array['img'];?>" alt="user img">
       </div>

        </div>
<!-- .................................................. -->

<table  class="table table-responsive table-dark table-striped " style="overflow: auto;">
    <thead>
      <tr>
        <th scope="col">slno</th>
        <th scope="col">pic</th>
        <th scope="col">product-name</th>
        <th scope="col">order-id</th>
        <th scope="col">price</th>
        <th scope="col">order-date</th>
        
      </tr>
    </thead>
    <tbody>
<!-- /////////////////////////////////////////////////////////////// -->

<?php
$table_name=$real_select_array['id'];
$show="SHOW TABLES LIKE '%$table_name%'";
$real_show=mysqli_query($result,$show);
$real_show_array=mysqli_fetch_assoc($real_show);
// print_r($real_select_array);
if($real_show_array){
  $show_cart="SELECT * FROM `$table_name`";
  $real_show_cart=mysqli_query($result,$show_cart);
 while( $real_show_cart_array=mysqli_fetch_assoc($real_show_cart)){

echo '<tr>';
echo " <td>".$real_show_cart_array['slno']."</td>";
$show_cart_img=$real_show_cart_array['product_img'];
echo " <td> "."<img src='$show_cart_img' alt='product' width='80px' height='80px'>" ."</td>";
echo " <td>".$real_show_cart_array['product_name']."</td>";
echo " <td>".$real_show_cart_array['product_id']."</td>";
echo " <td>".$real_show_cart_array['product_price']."</td>";
echo " <td>".$real_show_cart_array['order_date']."</td>";

echo '</tr>';

 }
  
}else{
  $create_table="CREATE TABLE IF NOT EXISTS `$table_name` (
    `slno` INT(11) NOT NULL AUTO_INCREMENT,
    `product_img` VARCHAR(255) NOT NULL,
    `product_name` VARCHAR(255) NOT NULL,
    `product_id` VARCHAR(255) NOT NULL,
    `product_price` VARCHAR(255) NOT NULL,
    `order_date` VARCHAR(32) NOT NULL,
    PRIMARY KEY (slno))";
 $real_create_table=mysqli_query($result,$create_table);

 if($real_create_table){
   echo 'table crated';
 }
}
?>

<!-- ////////////////////////////////////////////////////////////////// -->
     
    </tbody>
  </table>

<!-- .................................................. -->
    </div>
</body>
</html>

