<?php 
 session_start();
 $uname=$_SESSION['uname'];
 $fname=$_SESSION['fname'];
 $lname=$_SESSION['lname'];
 $ename=$_SESSION['ename'];
 $gen=$_SESSION['gen'];
 $dob=$_SESSION['dob'];
 $conn=mysqli_connect('localhost','insta','111','insta');
 if(!$conn){
    die("Connection Unsuccesfull");
 }
 $sql="select * from images";
 $result=mysqli_query($conn,$sql);


?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="stylesheet" href="dashboardstyle.css">
    <script src="https://kit.fontawesome.com/202dba6802.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="igheaderpic.png" alt="Logo Image" class="Logo">
                </nav>
                <div class="header-text">
                <h1 align="center">hey, <span id='hehesi'>    <?php echo $fname." ".$lname ?> </span> </h1>
               <!-- <p>Welcome to Na Book - where the power of images takes center stage! We're thrilled to have you here and can't wait to see the world through your lens. Whether you're here to share your visual stories or explore the journeys of others, we hope you find inspiration, connection, and joy on our platform. So, take a deep breath, get comfortable, and get ready to embark on an exciting visual journey with us. Happy exploring!</p>
                -->
            </div>

            <!--    <ul id="sidemenu">
                    <li><a href="#header">Home</a></li>
                    <li><a href="#ups">User Photos</a></li>
                    <li><a href="#services">Feed</a></li>
                    <li><a href="#los">Upload</a></li>
                    <li><a href="logof.php">Logout</a></li>
                </ul>-->
                <div class="row">
  <div class="column">
    <img href="#header" src="1.png"  style="width:90px;height:90px">
    <h3>home</h3>
  </div>
  <div class="column">
    <a href="#ups"> <img  src="2.png" style="width:90px;height:90px"> </a>
    <h3>my profile</h3>
  </div>
  <div class="column">
  <a href="#services"> <img  src="3.png" style="width:90px;height:90px"> </a>
    <h3>feed</h3>
  </div>
  <div class="column">
  <a href="#los"> <img  src="4.png" style="width:90px;height:90px"> </a>
    <h3>upload</h3>
  </div>
  <div class="column">
  <a href="logof.php"> <img  src="5.png" style="width:90px;height:90px"> </a>
    <h3>logout</h3>
  </div>
</div>
            
            
            
        </div>   
         
    </div>



    <div id="services">
        <div class="container">
            <h1 class="sub-title">Feed</h1>
             <div class="services-list">
                <?php 
                $imcc=200;
                $cnt=0;
                $ids=1;
                $idh=300;
                $idss=1000;
                $idsc=500;
                $idssch=600;
                $idscp=700;
                $butid=2000;
                $commid=3000;
                
                while($row = mysqli_fetch_assoc($result)) {
                    
                ?>
                <div>
                    <h2 align="center" id='<?php echo $idh;?>'><?php echo $row['uname'];?>   </h2>
                    <img  id ="<?php echo $imcc?>" src="<?php echo $row['img']?>" alt="nn">
                     <form action="likecom.php" method="post">
                        <button class='bute' type='submit' name=<?php echo $butid; ?> style="border:0px;outline:none;"> 
                        <?php 
                        $sql="select * from liketab where uname='$uname' and imgno='$ids'";
                        $res=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($res)==0){
                            ?>
                             <i class="fa-regular fa-heart" style="color: #ffffff; background-color: #003366;" ></i>
                            
                            <?php
                        }else{
                            ?>
                            <i class="fa-solid fa-heart" style="color: #fb3958; background-color: #003366;" ></i>
                            <?php
                        }
                        ?>
                        
                       
                    
                    
                    </button>
                        <i class="fa-regular fa-comment" style="color: #ffffff;"></i>
                    </form>
                   
                    
                    <br>
                    <span> <label id="<?php echo $ids;?>"><?php echo $row['likes']." ";?></label>  Likes</span>
                   <form action="commies.php" method='post'>
                        <table>
                            <tr>
                                <td><label for="">Add comment:</label></td>
                                <td><input type="text" name="<?php echo $idsc;?>" id="<?php echo $idsc;?>"></td>
                                <td><button  type='submit' name="<?php echo $commid;?>">Post</button></td>
                                
                                
                            </tr>
                        </table>
                        </form>
                    <?php    
                    $sql="SELECT  * from comtab where imgno='$ids'";
                    $resii=mysqli_query($conn,$sql);
                    while($comrow=mysqli_fetch_assoc($resii)){

                    

                    ?>
                    <nav class="nene">
                        <h4 style="display: inline-block;" id="<?php echo $idssch;?>"><?php echo $comrow['com']?> </h4>
                        <p style="padding-left:0px" id="<?php echo $idscp;?>"><?php echo $comrow['comm'];?></p>
                    </nav>

<?php }?>
                </div>
                <?php $ids+=1;$idss+=1; $idsc+=1;
                $idssch+=1;$butid+=1;$commid+=1;
                $idscp+=1;$idh+=1;$cnt+=1;$imcc+=1; }
                $_SESSION['cnt']=$cnt;
                ?>

             </div>
        </div>
    </div>



<?php 
$sql="select * from images where uname='$uname'";
$result=mysqli_query($conn,$sql);

?>
<div id='ups'>
    <div id="services">
        <div class="container">
            <h1 class="sub-title">User Photos</h1>
             <div class="services-list">
             <?php 
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div>
        
                    <h2 align="center"><?php echo $row['uname'];?>   </h2>
                    <img src="<?php echo $row['img']?>" alt="">
                    
                    <i class="fa-regular fa-heart" style="color: #ffffff;"></i>
                    <i class="fa-regular fa-comment" style="color: #ffffff;"></i>
                    <br>
                    <span><?php echo $row['likes']." ";?> Likes</span>
                    <?php 
                    $imn=$row['imgno'];
                    $sql="SELECT * from comtab where imgno='$imn'";
                    $z=mysqli_query($conn,$sql);
                    while($comr = mysqli_fetch_assoc($z)){                    
                    ?>
                    <nav>
                        <h4 style="display: inline-block;"><?php echo $comr['com'];?> </h4>
                        <p><?php echo $comr['comm'];?></p>
                    </nav>
                    <?php }?>
                </div>
                <?php }?>
        </div>
    </div>
    </div>

<div id='los'>
    <div id="services">
        <div class="container">
            <h1 class="sub-title">Login / Sign Up!!</h1>
             <div class="services-list">
                <div>
                    
                    <h2 align="center">Upload Your Images Here!!!</h2>
                    <center>
                    <form action="imup.php"method='post' enctype="multipart/form-data">
                        <table cellspacing="15px" cellpadding="0px">
                         <tr>
                            <td><Label>Upload Your Image : </Label></td>
                            <td><input type="file" name="ftu" id='ftu'></td>
                         </tr>
                        </table>
                        <input type="submit" name="sus" id="buts" value="Post" style="padding: 5px 10px">
                    </form>
                </center>
                </div>
                <div>
                    
                    <h2 align="center">User Details    </h2>
                    
                    <table>
                        <tr>
                            <td><label for="">Name: </label></td>
                            <td><label for=""><?php echo $fname." ".$lname;?> </label></td>
                        </tr>
                        <tr>
                            <td><label for="">Username : </label></td>
                            <td><label for=""><?php echo $uname;?></label></td>
                        </tr>
                        <tr>
                            <td><label for="">Email: </label></td>
                            <td><label for=""><?php echo $ename;?></label></td>
                        </tr>
                        <tr>
                            <td><label for="">Gender: </label></td>
                            <td><label for=""><?php echo $gen;?></label></td>
                        </tr>
                        
                    </table>
                
                </div>
                
             </div>
        </div>

    </div>
    </div>
</body>
</html>

<?php 
$conn=mysqli_connect('localhost','insta','111','insta');
if(!$conn){
    echo "Connection Failed.";
    die('connection failed');
}

if(isset($_POST['sus'])){
    $target_dir='Images/';
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
         $mys="insert into images(uname,img,likes,com,comm) values('$uname','$img',0,'','')";
         
            if (mysqli_query($conn, $mys)) 
        {
         echo "Image stored in database";
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
    }
    
  }

?>