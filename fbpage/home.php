<?php 
 session_start();

 $conn=mysqli_connect('localhost','insta','111','insta');
 if(!$conn){
    die("Connection Unsuccesfull");
 }
 $sql="SELECT * from images order by likes desc limit 5";
 $result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="homestyle.css">
    <title>insta</title>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="igheaderpic.png" alt="Logo Image" class="Logo">
                <ul id="sidemenu">
                    <li><a href="#header">Home</a></li>
                    <li><a href="#services">Login</a></li>
                    <li><a href="#services">Sign up</a></li>
                </ul>
            </nav>
            <div class="header-text">
                <h1 align="center">Welcome To Instagram</h1>
                
             <div id="topy">
        
            <h1 class="sub-title">Top 5 Photos</h1>
             <div class="topy-list">
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
    </div>
        
    <div id="services">
        <div class="container">
            <h1 class="sub-title">join us</h1>
             <div class="services-list">
                <div>
                    <i class="fa-solid fa-graduation-cap" style="color: #ffffff;"></i>
                    <h2 align="center">sign up</h2>
                    <center>
                    <form action="loginvalid.php" method="post">
                        <table cellspacing="15px" cellpadding="0px">
                            <tr>
                                <td><label>First Name: </label></td>
                                <td><input type="text" id="fname" name="fname"></td>                                
                            </tr>
                            <tr>
                                <td><label >Last Name: </label></td>
                                <td><input type="text" id="lname" name="lname"></td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Username: </label>
                                </td>
                                <td><input type="text" id="uname" name="uname"></td>
                            </tr>
                            <tr>
                                <td><label >Email: </label></td>
                                <td><input type="email" id="ename" name="ename"></td>
                            </tr>
                            <tr>
                                <td><label >Gender </label></td>
                                <td><input type="radio" id="gen" name="gen" value="Male">Male
                                    <input type="radio" id="gen" name="gen" value="Female">Female
                                </td>
                            </tr>
                            <tr>
                                <td><label >Date Of Birth : </label></td>
                                <td><input type="date" id="dob" name="dob"></td>
                            </tr>
                            <tr>
                                <td><label >New Password: </label></td>
                                <td><input type="password" id="pass" name="pass"></td>
                            </tr>
                            <tr>
                                <td><label>Confirm  Password</label></td>
                                <td><input type="password" name="cpass" id="cpass"></td>
                            </tr>
                        </table>
                        <input type="submit" name="ss" id="buts" value="Sign up">
                    </form>
                </center>
                </div>
                <div>
                    <i class="fa-solid fa-money-bill" style="color: #ffffff;"></i>
                    <h2 align="center">Login    </h2>
                    <center>
                    <form action="loginvalid.php" method="post">
                        
                            <table cellspacing="15px" cellpadding="0px">
                                <tr>
                                    <td><label for="">Username: </label></td>
                                    <td><input type="text" name="uname" id="uname"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Password: </label></td>
                                    <td><input type="password" name="pass" id="pass"></td>
                                </tr>
                                
                             </table>
                       
                            <input type="submit" name="logs" id="buts" value="Login">
                    </form>
                </center>
                </div>
                
             </div>
        </div>

    </div>
</body>
</html>