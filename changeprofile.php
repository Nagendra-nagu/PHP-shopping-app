<?php
session_start();
include 'connection.php';
$email=$_SESSION['email'];
$select="SELECT * FROM `userlogin` WHERE email='$email'";
$real_select=mysqli_query($result,$select);
$real_select_array=mysqli_fetch_assoc($real_select);

?>

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
    <label for="exampleInputName1" class="form-label" >Name</label>
    <input type="text" class="form-control" id="exampleInputName1"  name='name' placeholder='Enter your Name' value="<?php echo $real_select_array['name'];?>"
    required>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email' placeholder='enter the registered email id please' value="<?php echo $real_select_array['email'];?>"
    required>
  </div>

  <div class="mb-3">
    <label for="exampleInputNumber1" class="form-label">Mobile number</label>
    <input type="number" class="form-control" id="exampleInputNumber1"  name='number' placeholder='Enter your Mobile Number' value="<?php echo $real_select_array['number'];?>"
    required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name='password' placeholder='enter your password' required>
  </div>

  <button type="submit" class="btn btn-primary" name='sigin'>Submit</button>

</form>
</div>
</body>

</html>

<?php
include 'connection.php';

if(isset($_POST['sigin'])){
    $pass_verify=0;
    $new_name=$_POST['name'];
    $new_email=$_POST['email'];
    $new_number=$_POST['number'];
    $password=$_POST['password'];

    $pas="SELECT password FROM `userlogin` WHERE email='$email'";
    $real_password=mysqli_query($result,$pas);
    $real_password_array=mysqli_fetch_assoc($real_password);
    $real_pass=$real_password_array['password'];
   
    $pass_verify=password_verify($password,$real_pass);
if($pass_verify){
    $update="UPDATE `userlogin` SET name='$new_name',email='$new_email',number='$new_number' WHERE email='$email'";
    $real_update=mysqli_query($result,$update);
    if($real_update){
    header('location:http://localhost/projects/project2/userprofile.php');
    }else{
        echo 'not updated';
    }
}else{
    echo '<h4>incorrect password</h4>';
}
 }
  
   

?>



