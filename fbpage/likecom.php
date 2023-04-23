<?php 
session_start();
$uname=$_SESSION['uname'];
$idsc=500;
$butid=2000;
$commid=3000;
$conn=mysqli_connect('localhost','insta','111','insta');
if(!$conn){
   die("Connection Unsuccesfull");
}
$sql="select * from images";
$z=mysqli_query($conn,$sql);
$cnt=mysqli_num_rows($z);

for($i=1;$i<=$cnt;$i++){
    if(isset($_POST[strval($butid)])){

        $sql="select * from liketab where uname='$uname' and imgno='$i'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==0){
            $sql="UPDATE images SET likes=likes+1 WHERE imgno='$i'";
            $x=mysqli_query($conn,$sql);
            $sql="INSERT INTO liketab(uname, imgno) VALUES ('$uname','$i')";
            $x=mysqli_query($conn,$sql);
        }else{
            $sql="UPDATE images SET likes=likes-1 WHERE imgno='$i'";
            $x=mysqli_query($conn,$sql);
            $sql="DELETE FROM liketab WHERE imgno='$i'";
            $x=mysqli_query($conn,$sql);
        }
        header('location:dashboard.php#services');
        break;
    }
    $butid+=1;
}

$temu=$_SESSION['uname'];
for($i=1;$i<=$cnt;$i++){

    if(isset($_POST[strval($commid)])){
        $comis=$_POST[strval($idsc+$i-1)];
        $sql="UPDATE images SET com='$temu',comm= '$comis'  WHERE imgno='$i'";
        $x=mysqli_query($conn,$sql);
        header('location:dashboard.php#services');
        break;
    }
    $commid+=1;
}

?>