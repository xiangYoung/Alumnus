<?php
/**
 * Created by PhpStorm.
 * User: vae
 * Date: 2017/6/10
 * Time: 8:34
 */

$conn = mysqli_connect("localhost:3306","root","123456","alumnus") or die(mysqli_error($conn));

mysqli_set_charset($conn,"utf8");

if (!get_magic_quotes_gpc()){ //检测是否对已经被 magic_quotes_gpc 转义过的字符串使用了addslashes()

    $user_email = addslashes($_POST['set_email']);

}
else{

   $user_email = $_POST['set_email'];

}

session_start();

$user_id = $_SESSION['id'];

$sql = "update users set email = '$user_email' where `id` = $user_id";

$result = mysqli_query($conn,$sql);

if (!$result){

    die("Could not update data:" .mysqli_error($conn));
}

else{

    echo "Updated data successfully!";

    $url = "login.html";

    echo "<script type='text/javascript'>";

    echo "window.location.href='$url'";

    echo "</script>";

}

mysqli_close($conn);