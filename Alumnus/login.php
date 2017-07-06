<?php
/**
 * Created by PhpStorm.
 * User: vae
 * Date: 2017/5/25
 * Time: 10:11
 */
$conn = mysqli_connect("localhost:3306","root","123456","alumnus") or die(mysqli_error($conn));

mysqli_set_charset($conn,"utf8");

if (!get_magic_quotes_gpc()){ //检测是否对已经被 magic_quotes_gpc 转义过的字符串使用了addslashes()

    $user_email = addslashes($_POST['user_email']);

    $user_pwd = addslashes($_POST['user_pwd']);

}
else{

    $user_email = $_POST['user_email'];

    $user_pwd = $_POST['user_pwd'];

}

session_start();


$sql = "select * from users";

$result = mysqli_query($conn,$sql);

if (!$result){

    die("Could not select data:" .mysqli_error($conn));
}

else{

    while ($row = mysqli_fetch_assoc($result))
    {
        if ($row['email'] == $user_email){

            if ($row['password'] == $user_pwd){   //登录成功并跳转

                $_SESSION['user_email'] = $user_email;

                $_SESSION['user_pwd'] = $user_pwd;

                $_SESSION['id'] = $row['id'];

                $url = "homepage.html";

                echo "<script type='text/javascript'>";

                echo "window.location.href='$url'";

                echo "</script>";

                break;

            }
            //邮箱输入正确，密码输入错误
            else{

                echo "<script>alert('帐号或密码错误')</script>";

                $url = "login.html";

                echo "<script type='text/javascript'>";

                echo "window.location.href='$url'";

                echo "</script>";
            }

        }

    } //结束while

    //邮箱输入错误或者密码输入错误

    echo "<script>alert('帐号或密码错误')</script>";

    $url = "login.html";

    echo "<script type='text/javascript'>";

    echo "window.location.href='$url'";

    echo "</script>";

}

mysqli_close($conn);