
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php';?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5 pt-5" >
<form method='POST'>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email' placeholder='enter the registered email id please'
    required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name='password' placeholder='enter your password' required>
  </div>
  <button type="submit" class="btn btn-primary mb-5" name='login'>Submit</button>
</form>

<!-- ////////////////////////////////////////////////////////////////////////// -->
<?php
include 'connection.php';
session_start();
$check=0;
$update=0;
$real_check=0;
$real_check_rows=0;
$real_update=0;
// $real_check_rows=0;
// ..................................to activate account............................
if(isset($_GET['token'])){
  $token=$_GET['token'];
  // echo $token;
  $check="SELECT token FROM `userlogin` WHERE token='$token'";
$real_check=mysqli_query($result,$check);
$real_check_rows=mysqli_fetch_assoc($real_check);
if($real_check_rows){
foreach($real_check_rows as $check_val){
  // echo '<br>'.$check_val;
}
}
if(isset($check_val)){
$update="UPDATE `userlogin` SET status='active' WHERE token='$token'";
$real_update=mysqli_query($result,$update);

if($real_update){
  echo "<h5 class='bg-success'>your account activated sucessfully</h5>";
}else{
  echo 'your account is not activated';
}
}else{
    echo 'sorry we couldnot activate your account right now';
}
}
// ...............................to login in....................
echo "<h5 class='bg-primary'>plese sigin in to continue</h5>";
if(isset($_POST['login'])){
  $email=$_POST['email'];
  $password=$_POST['password'];

  $log_select="SELECT * FROM `userlogin` WHERE email='$email'";
  $real_log_select=mysqli_query($result,$log_select);
  if($real_log_select){
    $real_log_select_array=mysqli_fetch_assoc($real_log_select);
    if($real_log_select_array){
      $i=0;
      foreach($real_log_select_array as $log_val){
        $i++;
      }
 
      if($i>4 && $real_log_select_array['status']=='active'){

        $log_password="SELECT password FROM `userlogin` WHERE email='$email'";
        $real_log_password=mysqli_query($result,$log_password);
        $real_log_password_array=mysqli_fetch_array($real_log_password);
    
        if($real_log_password_array){
             
          foreach($real_log_password_array as $real_log_password_val){
                // echo $real_log_password_val;
          }
          if(password_verify($password,$real_log_password_val)){
            $_SESSION['name']=$real_log_select_array['name'];
            $_SESSION['email']=$real_log_select_array['email'];
           header('location:http://localhost/projects/project2/userpage.php');
          }else{
            echo 'sorry the password is inncorrect';
          }
        }
      }else{
        echo 'sorry the account with this email id not found';
      }
    }
  }
}
// ..................................................................
?>
<!-- //////////////////////////////////////////////////////////////////////////////// -->
</div>
</body>
</html>


 
