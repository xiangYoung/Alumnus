<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>Activity</title>

        <link rel="stylesheet" type="text/css" href="css/reset.css">

        <link rel="stylesheet" type="text/css" href="css/activity.css">

        <link rel="stylesheet" type="text/css" href="fontcss/css/font-awesome.css">

        <script src="js/jquery.js" type="text/javascript"></script>

        <script src="js/activity.js" type="text/javascript"></script>

    </head>

    <body>



    <header>

        <div class="wrapper">

            <img src="img/logo.png" alt="Crafty" class="logo">

            <nav id="nav_menu">

                <ul>

                    <li><a href="index.html">家</a></li>

                    <li><a href="#">服务</a></li>

                    <li><a href="#">关于</a></li>

                    <li><a href="#">联系</a></li>

                </ul>

            </nav>

        </div>

    </header><!--  End Header  -->



    <section class="billboard">

        <div class="activity_list">

            <?php

            $conn = mysqli_connect("localhost:3306","root","123456","alumnus") or die(mysqli_error($conn));

            mysqli_set_charset($conn,"utf8");

            // session_start();

            // $user_id = $_SESSION['id'];

            $sql2 = "select * from activities";//获取活动表里的内容

            $result2 = mysqli_query($conn,$sql2);

            if (!$result2){

                die("Could not select data:" .mysqli_error($conn));
            }

            else {

                while ($row2 = mysqli_fetch_assoc($result2)) {

                    //if ($row2['raiser'] == $user_id) {

                    $user_id = $row2['sponsor'];

                    $activity_class = $row2['activity_classes'];

                    $activity_content = $row2['activity_content'];

                    $sponse_time = $row2['sponse_time'];

                    $tissue_time = $row2['tissue_time'];

                    $sql1 = "select * from users";//获取昵称等信息

                    $result1 = mysqli_query($conn,$sql1);

                    if (!$result1){

                        die("Could not select data:" .mysqli_error($conn));
                    }

                    else {

                        while ($row1 = mysqli_fetch_assoc($result1)) {

                            if ($row1['id'] == $user_id) {

                                $user_name = $row1['nick'];

                                $user_college = $row1['college'];

                            }

                        }
                    }

                    $sql5 = "select * from person_info";//获取城市等信息

                    $result5 = mysqli_query($conn,$sql5);

                    if (!$result5){

                        die("Could not select data:" .mysqli_error($conn));
                    }

                    else {

                        while ($row5 = mysqli_fetch_assoc($result5)) {

                            if ($row5['id'] == $user_id) {

                                $user_city = $row5['city'];

                                $user_career = $row5['career'];

                            }

                        }
                    }

                    echo "<table class='showActivity_tab'>";

                    echo "<tr>";

                    echo "<td>";echo $user_name;echo "</td>";

                    echo "<td>";echo $user_college;echo "</td>";

                    echo "<td class='no_background'>";echo "</td>";

                    echo "</tr>";

                    echo "<tr>";

                    echo "<td>";echo $user_city;echo "</td>";

                    echo "<td>";echo $user_career;echo "</td>";

                    echo "<td class='no_background'>";echo "</td>";

                    echo "</tr>";

                    echo "<tr>";

                    echo "<td>";echo "发起时间";echo "</td>";

                    echo "<td>";echo $sponse_time;echo "</td>";

                    echo "<td class='no_background'>";echo "</td>";

                    echo "</tr>";

                    echo "<tr>";

                    echo "<td>";echo "活动类别";echo "</td>";

                    echo "<td>";echo $activity_class;echo "</td>";

                    echo "<td class='no_background'>";echo "</td>";

                    echo "</tr>";

                    echo "<tr>";

                    echo "<td>";echo "活动内容";echo "</td>";

                    echo "<td>";echo $activity_content;echo "</td>";

                    echo "<td class='no_background'>";echo "</td>";

                    echo "</tr>";

                    echo "<tr>";

                    echo "<td>";echo "组织时间";echo "</td>";

                    echo "<td>";echo $tissue_time;echo "</td>";

                    echo "<td class='no_background'>";echo "</td>";

                    echo "</tr>";

                    echo "<tr>";

                    echo "<td>";echo "<i class='icon-heart-empty'></i><a class='love'>赞同</a>";echo "</td>";

                    echo "<td>";echo "<i class='icon-star-empty'></i><a class='attention'>关注</a>";echo "</td>";

                    echo "<td>";echo "<i class='icon-comment-alt'></i><a class='comment'>评论</a>";echo "</td>";

                    echo "</tr>";

                    echo "</table>";

                    // }
                    echo "<form class='comment_form' method='post' action='comment.php'>";//参照answer.php

                    echo "<table class='comment_tab'>";

                    echo "<tr>";

                    echo "<td>";

                    echo "<textarea class='content' name='comment_content' rows='2' cols='50'>";

                    echo "</textarea>";

                    echo "</td>";

                    echo "<td>";

                    echo "<input class='comment_sub' type='submit' value='评论'>";

                    echo "</td>";

                    echo "</tr>";

                    echo "</table>";

                    echo "</form>";

                    $sql3 = "select * from activity_comments";//获取活动评论表里的内容，代码位置有误

                    $result3 = mysqli_query($conn,$sql3);

                    if (!$result3){

                        die("Could not select data:" .mysqli_error($conn));
                    }
                    else{

                        while ($row3 = mysqli_fetch_assoc($result3)) {

                            if($row3['activity_id'] == $row2['activity_id']) {
                                $user_id = $row3['commenter'];

                                $comment_content = $row3['comment_content'];

                                $comment_time = $row3['comment_time'];

                                $sql4 = "SELECT * FROM users";//获取昵称，邮箱

                                $result4 = mysqli_query($conn, $sql4);

                                if (!$result4) {

                                    die("Could not select data:" . mysqli_error($conn));
                                } else {

                                    while ($row4 = mysqli_fetch_assoc($result4)) {

                                        if ($row4['id'] == $user_id) {

                                            $user_name = $row4['nick'];

                                            $user_email = $row4['email'];

                                        }

                                    }
                                }
                                echo "<table class='comment_tab'>";

                                echo "<tr>";

                                echo "<td>";
                                echo $user_name;
                                echo "</td>";

                                echo "<td>";
                                echo $user_email;
                                echo "</td>";

                                echo "<td>";
                                echo $comment_content;
                                echo "</td>";

                                echo "<td>";
                                echo $comment_time;
                                echo "</td>";

                                echo "</tr>";

                                echo "</table>";
                            }//if
                        }//while

                    }//else

                }//while

            }//else

            mysqli_close($conn);

            ?>

        </div>

        <div class="sponse">

            <form method="post" action="activitySponse.php"><!--参照questionRaise.php-->

                <table class="sponse_tab">

                    <tr>

                        <td><input type="text" name="activity_class" placeholder="活动类别"></td>

                    </tr>

                    <tr>

                        <td><input type="text" name="tissue_time" placeholder="活动组织时间"></td>

                    </tr>

                    <tr>

                        <td><textarea class="content" rows="7" cols="40" name="activity_content" placeholder="内容"></textarea></td>

                    </tr>

                    <tr>

                        <td><input class="sponse_sub" type="submit" value="发起"></td>

                    </tr>

                </table>

            </form>

        </div>

    </section><!--  End Billboard  -->



    <footer>

        <img src="img/logo_footer.png" alt="Crafty">

        <p class="rights">Copyright © xiangYoung</p>

    </footer><!--  End Footer  -->



    </body>

</html>