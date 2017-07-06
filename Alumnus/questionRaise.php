<?php
/**
 * Created by PhpStorm.
 * User: vae
 * Date: 2017/6/10
 * Time: 10:12
 */

$conn = mysqli_connect("localhost:3306","root","123456","alumnus") or die(mysqli_error($conn));

mysqli_set_charset($conn,"utf8");

session_start();

$user_id = $_SESSION['id'];

if (!get_magic_quotes_gpc()){ //检测是否对已经被 magic_quotes_gpc 转义过的字符串使用了addslashes()

    $question_class = addslashes($_POST['question_class']);

    $question_content = addslashes($_POST['question_content']);

}
else{

    $question_class = $_POST['question_class'];

    $question_content = $_POST['question_content'];
}

$sql = "insert into questions (`raiser`, `matter_classes`, `matter_content`) values

('$user_id', '$question_class', '$question_content')";

$result = mysqli_query($conn,$sql);

if (!$result){

    die("Could not enter data:" .mysqli_error($conn));
}

else{

    echo "Entered data successfully!";

    $_SESSION['question_class'] = $question_class;

    $_SESSION['question_content'] = $question_content;

    $url = "aq.php";

    echo "<script type='text/javascript'>";

    echo "window.location.href='$url'";

    echo "</script>";
}

mysqli_close($conn);
