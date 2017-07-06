<?php
/**
 * Created by PhpStorm.
 * User: vae
 * Date: 2017/6/10
 * Time: 16:06
 */

$conn = mysqli_connect("localhost:3306","root","123456","alumnus") or die(mysqli_error($conn));

mysqli_set_charset($conn,"utf8");

session_start();

$user_id = $_SESSION['id'];

$matter_id = $_SESSION['matter_id'];

if (!get_magic_quotes_gpc()){ //检测是否对已经被 magic_quotes_gpc 转义过的字符串使用了addslashes()

    $answer_content = addslashes($_POST['answer_content']);

}
else{

    $answer_content = $_POST['answer_content'];
}

/*$sql1 = "select * from questions";

$result1 = mysqli_query($conn,$sql1);

if (!$result1){

    die("Could not select data:" .mysqli_error($conn));
}

else{    //代码有逻辑错误

    while ($row = mysqli_fetch_assoc($result1)) {

        if ($row['raiser'] == $user_id) {

            $matter_id = $row['matter_id'];

        }

    }
}*/

$sql = "insert into answers (`matter_id`, `answerer`, `answer_content`) values

('$matter_id', '$user_id', '$answer_content')";

$result = mysqli_query($conn,$sql);

if (!$result){

    die("Could not enter data:" .mysqli_error($conn));
}

else{

    echo "Entered data successfully!";

    $_SESSION['answer_content'] = $answer_content;

    $url = "aq.php";

    echo "<script type='text/javascript'>";

    echo "window.location.href='$url'";

    echo "</script>";
}

mysqli_close($conn);
