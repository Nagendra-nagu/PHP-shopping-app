<?php
session_start();
if(!isset($_SESSION['name'])){
    header('location:http://localhost/projects/project2/login.php');
}
include 'connection.php';
$email_logo=$_SESSION['email'];
$logo="SELECT * FROM `userlogin` WHERE email='$email_logo'";
$real_logo=mysqli_query($result,$logo);
$real_logo_array=mysqli_fetch_assoc($real_logo);
$logo_img=$real_logo_array['img'];
?>


<?php
include 'connection.php';
if(isset($_POST['heart-submit'])){
 $psl=$_POST['product_slno'];
 $uid=$real_logo_array['id'];
 $cartproduct="select * from products where id='$psl'";
 $real_cartproduct=mysqli_query($result,$cartproduct);
 $real_cartproduct_array=mysqli_fetch_assoc( $real_cartproduct);
$cimg=$real_cartproduct_array['img'];
$cname=$real_cartproduct_array['name'];
$cid=$real_cartproduct_array['id'];
$cprice=$real_cartproduct_array['pricing'];
$tym=date("Y-m-d h:i:sa");
 $cart_insert="insert into `$uid` (product_img,product_name,product_id,product_price,order_date) values('$cimg','$cname','$cid','$cprice','$tym')";
 $real_cart_insert=mysqli_query($result,$cart_insert);
} 
?>
<!-- ////////////////////////////////////////////////// -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="logo" href="images/logo1.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER LOGIN</title>

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css"
    />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="userpage.css">
</head>
<body>
    <div class="main-container">
        <div class="main-container1">
<div class="navbar-main-container">
   <div class="navbar-container">
    <div class="logo"><img src="<?php echo $logo_img;?>" alt="logo" class='logo-img' style="border-radius:60%;width:80px;height:80px;"></div>
   <div class="bar">
    <form action="" method='POST' class="serch-bar search-bar1">
        <input type="text" class="text1" name='search_bar srarch-bar1' placeholder='search products'>
        <input type="submit" class="btn" value='search'>
    </form>
   </div>

    <div class="nav-icons" id='nav-iconsid'>

        <div class="name"><p><?php echo $_SESSION['name'];?></p></div>
        <div class="cart"> <a href="usercart.php"><i class="fas fa-shopping-cart"></i></a> <p ><a id='cart1' href="usercart.php">cart</a></p></div>
 
        <div class="profile"> <a href="userprofile.php"><i class="far fa-user-circle"></i></a> <p ><a id='profile1' href="userprofile.php">profile</a></p></div>
    
        <button class="logout-btn"> <a href="logout.php">Logout</a></button>


    </div>



    <div class="icon-container" >
        <div class="icon" id='cl'>
            <div class="icon1"></div>
  
            <div class="icon2"></div>
  
            <div class="icon3"></div>
        </div>
      </div>
</div>   
</div>
<div class="bar">
    <form action="" method='POST' class="serch-bar search-bar2">
        <input type="text" class='text1 text2' name='search_bar' placeholder='search products'>
        <input type="submit" class="btn" value='search'>
    </form>
</div>
</div>
</div>
<!-- ............................bootstrap carsoule................................ -->


    <div id="carouselExampleDark" class="carousel carousel-dark slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="images/product1.png" class="d-block w-100" alt="products">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="text-light">First slide label</h5>
              <p class="text-light" >Some representative placeholder content for the first slide.</p>
            <a href="#" class="blog-slider__button">Order Now</a>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="images/product2.png" class="d-block w-100" alt="products">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="text-light">Second slide label</h5>
              <p class="text-light" >Some representative placeholder content for the second slide.</p>
            <a href="#" class="blog-slider__button">Order Now</a>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/product3.png" class="d-block w-100" alt="products">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="text-light">Third slide label</h5>
              <p class="text-light" >Some representative placeholder content for the third slide.</p>
            <a href="#" class="blog-slider__button">Order Now</a>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


<!-- .................carsol........................... -->

<div class="blog-slider">
    <div class="blog-slider__wrp swiper-wrapper">
      <!-- ......................................................... -->
      <?php
      include 'connection.php';
      $products="SELECT * FROM `products`";
      $real_product=mysqli_query($result,$products);
      while($real_product_array=mysqli_fetch_assoc( $real_product)){
      // print_r( $real_product_array);
      $pslno=$real_product_array['id'];
      $pname=$real_product_array['name'];
      $pfeatures=$real_product_array['features'];
      $pdiscription=$real_product_array['discription'];
      $ppricing=$real_product_array['pricing'];
      $pimg=$real_product_array['img'];
      echo "<div class='blog-slider__item swiper-slide'>";
        echo "<div class='blog-slider__img'>";
          echo "<img src='$pimg' alt='' />";
        echo "</div>";
        echo "<div class='blog-slider__content'>";
          echo "<span class='blog-slider__code'>26 December 2019</span>";
          echo "<div class='blog-slider__title'>$pname</div>";
          echo "<div class='blog-slider__text'>";
            echo"$pdiscription";
          echo "</div>";
          echo "<a href='#' class='blog-slider__button'>Order-now</a>";
          echo "<form method='POST'> 
          <input type='text'  value='$pslno' style='display:none; '>
         <label for='heart'> <i class='far fa-heart' style='font-size:30px;margin:10px'></i></label>
          <input id='heart' type='submit' style='display:none; ' >
          </form>";
        echo "</div>";
      echo "</div>";
      }
      ?>
        <!-- ..................................................................................................... -->
    </div>
    <div class="blog-slider__pagination"></div>
  </div>
<!-- ................................................... -->
<div class="row row-cols-1 row-cols-md-3 g-4 mt-5 ml-2 mr-2">
<?php
 include 'connection.php';
 $products1="SELECT * FROM `products`";
 $real_product1=mysqli_query($result,$products1);
 $real_product_array1=mysqli_fetch_assoc( $real_product1);
//  $real_product_length=mysqli_num_rows($real_product_array1);
 while($real_product_array1=mysqli_fetch_assoc( $real_product1)){
 // print_r( $real_product_array);
 $pslno1=$real_product_array1['id'];
 $pname1=$real_product_array1['name'];
 $pfeatures1=$real_product_array1['features'];
 $pdiscription1=$real_product_array1['discription'];
 $ppricing1=$real_product_array1['pricing'];
 $pimg1=$real_product_array1['img'];
//  $ptym=date("Y-m-d h:i:sa");
$ptym=$real_product_array1['time'];
echo "
<div class='col'>
<div class='card'>
  <img src='$pimg1' class='card-img-top' alt='$pimg1'>
  <div class='card-body'>
    <h5 class='card-title'>$pname1</h5>
    <p class='card-text'>$pdiscription1</p>
    <h5 class='card-title'>$ppricing1</h5>
<form method='POST'>
    <input  class='fav-select' value='' style='display:none' name='product_slno'>
    <button type='submit' class='btn btn-primary favrate-cart' accessKeyLabel=$pslno1 name='heart-submit'>Add to cart</button>
</form>
<div class='card-footer'>
        <small class='text-muted'>Last updated $ptym</small>
      </div>
  </div>
</div>
</div>

";
 }
 ?>

  </div>



<script>
let favrate=document.getElementsByClassName('favrate-cart');
// console.log(favrate);
for(let i=0; i<favrate.length;i++){
favrate[i].addEventListener('click',()=>{
 let fav_select= document.getElementsByClassName('fav-select');

let favVal=favrate[i].attributes.accesskeylabel.nodeValue;
a=3;
console.log(favVal);
console.log(fav_select.name);
for(let j=0; j<favrate.length;j++){
//  console.log(fav_select[j].nextSibling.nextElementSibling.attributes.value=favVal);
fav_select[j].value=favVal;
// console.log(fav_select[j].value);
// console.log(favVal);

}
});
}
</script>



<!-- ........................................................ -->
  <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"
  ></script>


<!-- ................................................... -->
<script src='userpage.js'></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>




<!-- //////////////////////////////////////////////////////// -->


