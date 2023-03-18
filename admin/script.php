<?php 

$con = mysqli_connect("localhost","root","","blog") or die("Database not connected".mysqli_connect_error());

//set timezone- Asia Kolkata 
date_default_timezone_set('Asia/Dhaka');
/**
 * Insert registration info
 */
if(isset($_POST['uname'])){

    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $uname=mysqli_real_escape_string($con,$_POST['uname']);
    $role=mysqli_real_escape_string($con,$_POST['role']);
    $pass=md5($_POST['pass']);

    $sql1="SELECT * FROM `register` WHERE uname='{$uname}'";

    $result=mysqli_query($con,$sql1);

    if(mysqli_num_rows($result)){

        echo "uname";
    }
    else{

        $sql="INSERT INTO `register`(`fname`, `lname`, `uname`, `pass`,`role`) VALUES ('{$fname}','{$lname}','{$uname}','{$pass}','{$role}')";

        $result=mysqli_query($con,$sql);
    
        if($result){
            echo "Success";
        }
        else {
            echo "Failed";
            
        }
    }
}

/**
 * Login Crediantial
 */

if(isset($_POST['luname'])){

    $uname=mysqli_real_escape_string($con,$_POST['luname']);
    $pass=md5($_POST['lpass']);

    $sql_session="SELECT * FROM `register` WHERE uname='{$uname}'";

    $result_session=mysqli_query($con,$sql_session);
    while($row=mysqli_fetch_assoc($result_session)){
        session_start();
        $_SESSION["name"] = $row['uname'];
        $_SESSION["role"] = $row['role'];
        $_SESSION["id"] = $row['id'];
    }

    $sql1="SELECT * FROM `register` WHERE uname='{$uname}' AND pass='{$pass}'";

    $result=mysqli_query($con,$sql1);

    if(mysqli_num_rows($result)){
        echo "Success";
    }
    else {
        echo "Failed";
        
    }
}

/**
 * Logout
 */

if(isset($_POST['data'])){

    session_unset();
    $logout=session_destroy();


    if($logout){
        echo "Success";
    }
    else {
        echo "Failed";
        
    }
}

/**
 * show Profile data
 */

if(isset($_POST['username'])){

    $uname=mysqli_real_escape_string($con,$_POST['username']);
       

            $sql="SELECT *FROM register WHERE uname='{$uname}'";

            $result=mysqli_query($con,$sql);

            if(mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_assoc($result);
            $data['register'] = $row;
            $data['error'] = '';
            } 
            else {

            $data['error'] = 'not_found';

            }
            echo json_encode($data);


}

/**
 * Update Profile data
 */

if(isset($_POST['usname'])){

    $fsname=mysqli_real_escape_string($con,$_POST['fsname']);
    $lsname=mysqli_real_escape_string($con,$_POST['lsname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $usname=mysqli_real_escape_string($con,$_POST['usname']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $prof=mysqli_real_escape_string($con,$_POST['prof']);


    $sql="UPDATE `register` SET `fname`='{$fsname}',`lname`='{$lsname}',`email`='{$email}',`profession`='{$prof}',`address`='{$address}',`phone`='{$phone}' WHERE  uname='{$usname}'";

    $result=mysqli_query($con,$sql);

    if($result){
        echo "Success";
    }
    else {
        echo "Failed";
        
    }
}

/**
 *Update Profile image 
 */

if(isset($_POST['upprofileimg']))
{
  
    $filename = $_FILES["profileimg"]["name"];
    $tempname = $_FILES["profileimg"]["tmp_name"];    
    $folder = "img/upload/".$filename;
    $usname=mysqli_real_escape_string($con,$_POST['username']);

    $sql="UPDATE `register` SET `image`='{$filename}' WHERE  uname='{$usname}'";

    $result=mysqli_query($con,$sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }

    if($result){
        header("Location:profile.php");
    }
    else {
        echo "Failed";
        
    }
}


/**
 * Add user data
 */

if(isset($_POST['newusername']))
{
    $fsname=mysqli_real_escape_string($con,$_POST['fsname']);
    $lsname=mysqli_real_escape_string($con,$_POST['lsname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $usname=mysqli_real_escape_string($con,$_POST['newusername']);
    $pass=md5($_POST['password']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $role=mysqli_real_escape_string($con,$_POST['role']);

    $sql1="SELECT * FROM `register` WHERE uname='{$usname}'";

    $result=mysqli_query($con,$sql1);

    if(mysqli_num_rows($result)){

        echo "uname";
    }
    else{
    $sql="INSERT INTO `register`(`fname`, `lname`, `uname`, `pass`, `email`,`phone`,`role`) VALUES ('{$fsname}','{$lsname}','{$usname}','{$pass}','{$email}','{$phone}','{$role}')";

    $result=mysqli_query($con,$sql);

    if($result){
       echo "Success";
    }
    else {
        echo "Failed";
        
    }
}

}

/**
 * Add category
 */
if(isset($_POST['addcat'])){

    $addcat=mysqli_real_escape_string($con,$_POST['addcat']);

    $sql="INSERT INTO `category`(`name`) VALUES ('{$addcat}')";

    $result=mysqli_query($con,$sql);

    if($result){
       echo "Success";
    }
    else {
        echo "Failed";
        
    }
}

/**
 * show Update category
 */
if(isset($_POST['upcat'])){

    $upcat=$_POST['upcat'];

    $upsql="SELECT * FROM `category` WHERE id='{$upcat}'";

    $upresult=mysqli_query($con,$upsql);

    if(mysqli_num_rows($upresult) == 1) {

        $row = mysqli_fetch_assoc($upresult);
        $data['update'] = $row;
        $data['error'] = '';
        } 
        else {

        $data['error'] = 'not_found';

        }
        echo json_encode($data);

}
/**
 *Update category Data
 */
if(isset($_POST['newupcatid'])){

    $cupid=$_POST['newupcatid'];
    $cupname=$_POST['newcupname'];

    $newupsql="UPDATE`category` SET name='{$cupname}' WHERE id='{$cupid}'";

    $newupresult=mysqli_query($con,$newupsql);
    if($newupresult){
        echo "Success";
    }
    else {
        echo "Failed";
        
    }
    


}

/**
 * Delete category
 */
if(isset($_POST['delcat'])){

    $del=$_POST['delcat'];

    $delsql="DELETE FROM `category` WHERE id='{$del}'";

    $delresult=mysqli_query($con,$delsql);

    if($delresult){
      echo "Success";
    }
    else {
    echo "Failed";
        
    }
}

/**
 * Add Post
 */
if(isset($_POST['addpost'])){
    
    $tile=mysqli_real_escape_string($con,$_POST['title']);
    $desc=mysqli_real_escape_string($con,$_POST['desc']);
    $catname=mysqli_real_escape_string($con,$_POST['catname']);

    $filename = $_FILES["postimg"]["name"];
    $tempname = $_FILES["postimg"]["tmp_name"];    
    $folder = "img/upload/post/".$filename;
    $usname=mysqli_real_escape_string($con,$_POST['author']);

    $date = date('Y-m-d H:i:s');

    $sql="INSERT INTO `post`(`title`, `image`, `author`, `date`, `category`,`description`) VALUES ('{$tile}','{$filename}','{$usname}','{$date}','{$catname}','{$desc}');";
    $sql.="UPDATE category SET posts=posts+1 WHERE id='{$catname}'";

    $result=mysqli_multi_query($con,$sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    if($result){
        header("Location:post.php");
    }
    else{
        echo "Error";
    }


 
}

/**
 * Delete Post
 */
if(isset($_POST['postid'])){

    $del=$_POST['postid'];

    $delsql="DELETE FROM `post` WHERE id='{$del}'";

    $delresult=mysqli_query($con,$delsql);

    if($delresult){
      echo "Success";
    }
    else {
    echo "Failed";
        
    }
}