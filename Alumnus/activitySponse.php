<?php
/**
 * Created by PhpStorm.
 * User: vae
 * Date: 2017/6/11
 * Time: 8:16
 */

$conn = mysqli_connect("localhost:3306","root","123456","alumnus") or die(mysqli_error($conn));

mysqli_set_charset($conn,"utf8");

session_start();

$user_id = $_SESSION['id'];

if (!get_magic_quotes_gpc()){ //检测是否对已经被 magic_quotes_gpc 转义过的字符串使用了addslashes()

    $activity_class = addslashes($_POST['activity_class']);

    $tissue_time = addslashes($_POST['tissue_time']);

    $activity_content = addslashes($_POST['activity_content']);

}
else{

    $activity_class = $_POST['activity_class'];

    $tissue_time = $_POST['tissue_time'];

    $activity_content = $_POST['activity_content'];
}

$sql = "insert into activities (`sponsor`, `activity_classes`, `activity_content`,`tissue_time`) values

('$user_id', '$activity_class', '$activity_content','$tissue_time')";

$result = mysqli_query($conn,$sql);

if (!$result){

    die("Could not enter data:" .mysqli_error($conn));
}

else{

    echo "Entered data successfully!";

    $_SESSION['activity_class'] = $activity_class;

    $_SESSION['tissue_time'] =  $tissue_time;

    $_SESSION['activity_content'] = $activity_content;

    $url = "activity.php";

    echo "<script type='text/javascript'>";

    echo "window.location.href='$url'";

    echo "</script>";
}

mysqli_close($conn);
