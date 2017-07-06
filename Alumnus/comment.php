<?php
/**
 * Created by PhpStorm.
 * User: vae
 * Date: 2017/6/11
 * Time: 9:19
 */

$conn = mysqli_connect("localhost:3306","root","123456","alumnus") or die(mysqli_error($conn));

mysqli_set_charset($conn,"utf8");

session_start();

$user_id = $_SESSION['id'];

if (!get_magic_quotes_gpc()){ //检测是否对已经被 magic_quotes_gpc 转义过的字符串使用了addslashes()

    $comment_content = addslashes($_POST['comment_content']);

}
else{

    $comment_content = $_POST['comment_content'];
}

$sql1 = "select * from activities";

$result1 = mysqli_query($conn,$sql1);

if (!$result1){

    die("Could not select data:" .mysqli_error($conn));
}

else{    //代码有逻辑错误

    while ($row = mysqli_fetch_assoc($result1)) {

        if ($row['sponsor'] == $user_id) {

            $activity_id = $row['activity_id'];

        }

    }
}

$sql = "insert into activity_comments (`activity_id`, `commenter`, `comment_content`) values

('$activity_id', '$user_id', '$comment_content')";

$result = mysqli_query($conn,$sql);

if (!$result){

    die("Could not enter data:" .mysqli_error($conn));
}

else{

    echo "Entered data successfully!";

    $_SESSION['comment_content'] = $comment_content;

    $url = "activity.php";

    echo "<script type='text/javascript'>";

    echo "window.location.href='$url'";

    echo "</script>";
}

mysqli_close($conn);