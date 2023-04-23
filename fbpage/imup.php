<?php 
session_start();
$uname=$_SESSION['uname'];
$conn=mysqli_connect('localhost','insta','111','insta');
if(!$conn){
    echo "Connection Failed.";
    die('connection failed');
}

if(isset($_POST['sus'])){
    $target_dir='images/';
    $target_file = $target_dir . basename($_FILES["ftu"]["name"]);
    $chk=1;
  
  if (file_exists($target_file)) {
      echo "Image already exist";
      $chk = 0;
    }
    $ftypee = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($ftypee != "jpg" && $ftypee != "png" && $ftypee != "jpeg" ) {
      echo "$ftypee is not allowed.Only jpeg,png,jpg is accepted";
      $chk = 0;
    }
  
    if ($chk == 1) {
      if (move_uploaded_file($_FILES["ftu"]["tmp_name"], $target_file)) {
          echo "The Image ". htmlspecialchars( basename( $_FILES["ftu"]["name"])). " has been uploaded.";
          $img=$target_file;
         $mys="insert into images(uname,img,likes) values('$uname','$img','0')";
         
            if (mysqli_query($conn, $mys)) 
        {
         echo "Image stored in database";
         header('location:dashboard.php');
        } 
        else
        {
       echo "Error: " . $sql . "" . mysqli_error($conn);
        }

        } else {
          echo "Error in uploading the Image!!!";
        }
    } else {
     echo 'File not uploaded';
     ?>
     <script>alert('image not uploaded');</script>
     <meta http-equiv="refresh" content="0.5;url=dashboard.php">
     <?php 
    }
    
  }

?>