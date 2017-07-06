<?php
/**
 * Created by PhpStorm.
 * User: vae
 * Date: 2017/6/9
 * Time: 16:38
 */
$conn = mysqli_connect("localhost:3306","root","123456","alumnus") or die(mysqli_error($conn));

mysqli_set_charset($conn,"utf8");

if (!get_magic_quotes_gpc()){ //检测是否对已经被 magic_quotes_gpc 转义过的字符串使用了addslashes()


    $user_name = addslashes($_POST['set_name']);

    $user_city = addslashes($_POST['set_city']);

    $user_career = addslashes($_POST['set_career']);

    $user_introduce = addslashes($_POST['set_introduce']);

}
else{

    $user_name = $_POST['set_name'];

    $user_city = $_POST['set_city'];

    $user_career = $_POST['set_career'];

    $user_introduce = $_POST['set_introduce'];

}

session_start();

$user_id = $_SESSION['id'];

$sql_upd = "update users set nick = '$user_name' where `id` = $user_id";

$result_upd = mysqli_query($conn,$sql_upd);

if (!$result_upd){

    die("Could not update data:" .mysqli_error($conn));
}

else{

    echo "Updated data successfully!";

    echo "</br>";

}

$sql_ins = "insert into person_info (`id`, `city`, `career`, `introduce`) values

('$user_id','$user_city', '$user_career', '$user_introduce')";

$result_ins = mysqli_query($conn,$sql_ins);

if (!$result_ins){

    die("Could not enter data:" .mysqli_error($conn));
}

else{

    echo "Entered data successfully!";

}
mysqli_close($conn);