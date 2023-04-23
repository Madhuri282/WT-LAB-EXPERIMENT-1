<?php 
$server_name="localhost";
$username="insta";
$password="111";
$database_name="insta";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
if(!$conn)
{
    echo "Connection unsuccessful";
}


if(isset($_POST['ss'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $uname=$_POST['uname'];
    $ename=$_POST['ename'];
    $gen=$_POST['gen'];
    $dob=$_POST['dob'];
    $pass=$_POST['pass'];
    
    
    
    $sql_query = "INSERT INTO users
    VALUES ('$fname','$lname','$uname','$ename','$gen','$dob','$pass')";

    if (mysqli_query($conn, $sql_query)) 
    {
       echo "your account has been created";
       session_start();
        
        $_SESSION['uname']=$uname;
        $_SESSION['fname']=$fname;
        $_SESSION['lname']=$lname;
        $_SESSION['ename']=$ename;
        $_SESSION['gen']=$gen;
        $_SESSION['dob']=$dob;
        
        header('location:dashboard.php');
    } 
    else
    {
       echo "Error: " . $sql . "" . mysqli_error($conn);
    }
}
if(isset($_POST['logs'])){
    
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    $sql="select * from users where uname='$uname' and pass='$pass'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        
        
        echo "Account login successful";
        session_start();
        $row=mysqli_fetch_assoc($result);
        $_SESSION['uname']=$uname;
        $_SESSION['fname']=$row['fname'];
        $_SESSION['lname']=$row['lname'];
        $_SESSION['ename']=$row['email'];
        $_SESSION['gen']=$row['gen'];
        $_SESSION['dob']=$row['dob'];
        header('location:dashboard.php');

    } else {  ?><script>alert('Invalid credentials');</script>
    <meta http-equiv="refresh" content="0.5;url=home.php#">
    <?php
        
      }
}

?>

