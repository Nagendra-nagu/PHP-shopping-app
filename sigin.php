
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
    <label for="exampleInputName1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputName1"  name='name' placeholder='Enter your Name'
    required>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email' placeholder='enter the registered email id please'
    required>
  </div>

  <div class="mb-3">
    <label for="exampleInputNumber1" class="form-label">Mobile number</label>
    <input type="number" class="form-control" id="exampleInputNumber1"  name='number' placeholder='Enter your Mobile Number'
    required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name='password' placeholder='enter your password' required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword2" class="form-label">Re-Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name='cpassword' placeholder='Confirm your password' required>
  </div>

  <div class="mb-3">
    <label for="exampleInputpic1" class="form-label">profile pic</label>
    <input type="file" class="form-control" id="exampleInputpic1"  name='img' required>
  </div>

  <button type="submit" class="btn btn-primary" name='sigin'>Submit</button>

</form>

<!-- .................................................... -->
<?php

include 'connection.php';
$real_email_select=0;
$real_email_select_array=0;
$real_email_select_col=0;
if(isset($_POST['sigin'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $file=$_FILES['img'];
// ........................................................
      $fileName=$file['name'];
      $fileError=$file['error'];
      $tmp_name1=$file['tmp_name'];
         if(!$fileError){
             $upload= 'images/'. $fileName;
            move_uploaded_file( $tmp_name1,$upload);
         }
  //  ..............................................................................

    $email_select="SELECT email FROM userlogin WHERE email='$email'";
    $real_email_select=mysqli_query($result,$email_select);
    $real_email_select_array=mysqli_fetch_array($real_email_select);
    
   
    if($real_email_select_array){
        echo 'Some has been registred using this mail id plese try another email id';
    }else{
     if($password===$cpassword){

      $epassword=password_hash($password,PASSWORD_BCRYPT);
      $ecpassword=password_hash($cpassword,PASSWORD_BCRYPT);
$token=bin2hex(random_bytes(16));
// echo $token;
$insert="INSERT INTO `userlogin` (name,email,number,password,confirm,token,status,img) VALUES ('$name','$email','$number','$epassword','$ecpassword','$token','inactive','$upload')";
$real_insert=mysqli_query($result,$insert);
if($real_insert){
  $subject='change password change mail';
  $body="click on the link to activate your account:http://localhost/projects/project2/login.php?token=$token" ;
  $head='From:youremail@gmail.com';
    
    //you have to change smpt code sendmail file in xammp folder
    
  $mail=mail($email,$subject,$body,$head);
  if($mail){
    echo 'mail has been sent plese check your email id';
  }else{
    echo 'mail id provided was in correct please check your mail';
  }
    }else{
  echo 'OOps! Some technical error Plese Try agin latter......';
}
     }else{
         echo 'passwor is not matching.........';
     }
  
    }
}
?>

<!-- .............................. -->
</div>
</body>
</html>

