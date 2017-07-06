<?php
/**
 * Created by PhpStorm.
 * User: vae
 * Date: 2017/6/10
 * Time: 9:22
 */

$conn = mysqli_connect("localhost:3306","root","123456","alumnus") or die(mysqli_error($conn));

mysqli_set_charset($conn,"utf8");

if (!get_magic_quotes_gpc()){ //检测是否对已经被 magic_quotes_gpc 转义过的字符串使用了addslashes()

    $user_pwd = addslashes($_POST['current_pwd']);

    $user_newPwd = addslashes($_POST['set_newPwd']);

    $user_new2Pwd = addslashes($_POST['verify_newPwd']);

}
else{

    $user_pwd = $_POST['current_pwd'];

    $user_newPwd = $_POST['set_newPwd'];

    $user_new2Pwd = $_POST['verify_newPwd'];

}

session_start();

$user_id = $_SESSION['id'];

if ($user_newPwd != $user_new2Pwd){

    echo "<script>";

    echo "alert('密码不一致')";

    echo "</script>";

    $url ="setAccount.php";

    echo "<script>";

    echo "window.location.href='$url'";

    echo "</script>";

}

else{

    $sql = "update users set password = '$user_newPwd' where `id` = $user_id";

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

}

mysqli_close($conn);