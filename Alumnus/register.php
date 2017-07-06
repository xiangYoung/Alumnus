<?php
/**
 * Created by PhpStorm.
 * User: vae
 * Date: 2017/4/19
 * Time: 15:01
 */
/*require_once "twig.php";
echo $twig->render("index.html", array('name' => 'Fabien'));
die();*/

$conn = mysqli_connect("localhost:3306","root","123456","alumnus") or die(mysqli_error($conn));

mysqli_set_charset($conn,"utf8");

session_start();

if (!get_magic_quotes_gpc()){ //检测是否对已经被 magic_quotes_gpc 转义过的字符串使用了addslashes()

    $user_name = addslashes($_POST['user_name']);

    $user_email = addslashes($_POST['user_email']);

    $user_pwd = addslashes($_POST['user_pwd']);

    $user_college = addslashes($_POST['user_college']);

    $user_major = addslashes($_POST['user_major']);
}
else{

    $user_name = $_POST['user_name'];

    $user_email = $_POST['user_email'];

    $user_pwd = $_POST['user_pwd'];

    $user_college = $_POST['user_college'];

    $user_major = $_POST['user_major'];
}

$sql = "insert into users (`nick`, `email`, `password`, `college`, `major`) values

('$user_name', '$user_email', '$user_pwd', '$user_college', '$user_major')";

$result = mysqli_query($conn,$sql);

if (!$result){

    die("Could not enter data:" .mysqli_error($conn));
}

else{


    echo "Entered data successfully!";

    $_SESSION['user_name'] = $user_name;

    $_SESSION['user_email'] = $user_email;

    $_SESSION['user_pwd'] = $user_pwd;

    $_SESSION['user_college'] = $user_college;

    $_SESSION['user_major'] = $user_major;

    $url = "homepage.html";

    echo "<script type='text/javascript'>";

    echo "window.location.href='$url'";

    echo "</script>";
}

mysqli_close($conn);
