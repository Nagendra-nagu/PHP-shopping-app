
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php';?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5 pt-5" >
<form method='POST' enctype="multipart/form-data">

<div class="mb-3">
    <label for="exampleInputEmail2" class="form-label">product-name</label>
    <input type="text" class="form-control" id="exampleInputEmail2"  name='product_name' placeholder='enter the model name of product'
    required>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">product-model</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  name='product_model' placeholder='enter the model name of product'
    required>
  </div>

  <div class="mb-3">
    <label for="exampleInputNumber1" class="form-label">discription about product</label>
    <input type="text" class="form-control" id="exampleInputNumber1"  name='product_discription' placeholder='enter discription of product'
    required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">product-price</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name='product_price' placeholder='enter the price of the product' required>
  </div>

  <div class="mb-3">
    <label for="exampleInputpic1" class="form-label">profile pic</label>
    <input type="file" class="form-control" id="exampleInputpic1"  name='img' required>
  </div>

  <button type="submit" class="btn btn-primary" name='submit'>Submit</button>

</form>

<!-- .................................................... -->
<?php

include 'connection.php';

if(isset($_POST['submit'])){
    $name=$_POST['product_name'];
    $product_model=$_POST['product_model'];
    $product_discription=$_POST['product_discription'];
    $product_price=$_POST['product_price'];
    $img=$_FILES['img'];
    $tym=date("Y-m-d h:i:sa");
// ........................................................
      $fileName=$img['name'];
      $fileError=$img['error'];
      $tmp_name1=$img['tmp_name'];
         if(!$fileError){
             $upload= 'images/product/'. $fileName;
            move_uploaded_file( $tmp_name1,$upload);
         }
  //  ..............................................................................
$insert="INSERT INTO `products` (`name`, `features`, `discription`, `pricing`, `img`,`time`) VALUES  ('$name','$product_model','$product_discription','$product_price','$upload','$tym')";
$real_insert=mysqli_query($result,$insert);
if($real_insert){
  echo "<script> alert('inserted sucessfully'); </script>";
}
}
?>

<!-- .............................. -->
</div>
</body>
</html>

