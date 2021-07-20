
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
    <title>userprofile</title>
    <link rel="stylesheet" href="userpage.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />

</head>
<body>
    <div class="profile-container">
       
        <div class="user-profile">
            <img  src="<?php echo $real_select_array['img'];?>" alt="">
            <form action="" class="etit-profilei-container" method="POST" enctype="multipart/form-data">
                <label for="select"><i class="fas fa-user-edit"></i></label>
                <input id='select' type="file" class="edit-profile" name="eidit_pic" style="display:none;">
                <button type="submit" class="edit-profile-btn" name="eidit_pic-btn"> change profile picture </button>
               </form>
            <div class="user-info">
                <p class="profile-name"><span>name</span><span><?php echo $real_select_array['name'];?></span></p>
            <p class="profile-email"><span>email</span><span><?php echo $real_select_array['email'];?></span></p>
            <p class="profile-token"><span>mobile-number</span><span><?php echo $real_select_array['number'];?></span></p>

           <form action="" class="etit-profile-container" method="POST">
               <!-- <label for="edit-profile-lable"><i class="fas fa-edit"></i></label>
               <input class="edit-profile" id="edit-profile-lable" type="submit" name="edit-profile"> -->
            <button  type="submit" class="edit-profile-btn" name="edit_profile"><a href="changeprofile.php">edit yoyr profilr</a></button>
           </form>
            </div>
            <div>
                <a href="userpage.php" class="button-p"> back to main</a>
            </div>
        </div>

    </div>
    
</body>
</html>
<?php
include 'connection.php';
if(isset($_POST['eidit_pic-btn'])){
$img=$_FILES['eidit_pic'];

    $img_name=$img['name'];
    $img_temp=$img['tmp_name'];
    $img_error=$img['error'];

    if(!$img_error){
     $upload='images/'.$img_name;
     move_uploaded_file($img_temp,$upload);
    
     $update="UPDATE `userlogin` SET img='$upload' WHERE email='$email'";
     $real_update=mysqli_query($result,$update);
     if(isset($real_update)){
        header('location:http://localhost/projects/project2/userprofile.php');
     }
    }
}
?>


<!-- if(!isset($_SESSION['email'])){
    header('location:http://localhost/projects/project2/login.php');
} -->