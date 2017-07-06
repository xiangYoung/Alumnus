<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>Answer & Question</title>

        <link rel="stylesheet" type="text/css" href="css/reset.css">

        <link rel="stylesheet" type="text/css" href="css/aq.css">

        <link rel="stylesheet" type="text/css" href="fontcss/css/font-awesome.css">

        <script src="js/jquery.js" type="text/javascript"></script>

        <script src="js/aq.js" type="text/javascript"></script>

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

        <div class="aq_list">

            <?php

                $conn = mysqli_connect("localhost:3306","root","123456","alumnus") or die(mysqli_error($conn));

                mysqli_set_charset($conn,"utf8");

                session_start();

               // $user_id = $_SESSION['id'];

            $sql2 = "select * from questions";//获取问题表里的内容

            $result2 = mysqli_query($conn,$sql2);

            if (!$result2){

                die("Could not select data:" .mysqli_error($conn));
            }

            else {

                while ($row2 = mysqli_fetch_assoc($result2)) {

                    //if ($row2['raiser'] == $user_id) {

                        $user_id = $row2['raiser'];

                        $_SESSION['matter_id'] = $row2['matter_id'];

                        $matter_class = $row2['matter_classes'];

                        $matter_content = $row2['matter_content'];

                        $raise_time = $row2['raise_time'];

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

                    echo "<table class='showQuestion_tab'>";

                        echo "<tr>";

                            echo "<td>";echo $user_name;echo "</td>";

                            echo "<td>";echo $user_college;echo "</td>";

                        echo "</tr>";

                        echo "<tr>";

                            echo "<td>";echo "提出时间";echo "</td>";

                            echo "<td>";echo $raise_time;echo "</td>";

                        echo "</tr>";

                        echo "<tr>";

                            echo "<td>";echo "问题类别";echo "</td>";

                            echo "<td>";echo $matter_class;echo "</td>";

                        echo "</tr>";

                        echo "<tr>";

                            echo "<td>";echo "问题内容";echo "</td>";

                            echo "<td>";echo $matter_content;echo "</td>";

                        echo "</tr>";

                        echo "<tr>";

                            echo "<td>";echo "<i class='icon-star-empty'></i><a class='attention'>关注</a>";echo "</td>";

                            echo "<td>";echo "<i class='icon-comment-alt'></i><a class='answer'>回答</a>";echo "</td>";

                        echo "</tr>";

                    echo "</table>";

                   // }
                    echo "<form class='answer_form' method='post' action='answer.php'>";

                        echo "<table class='answer_tab'>";

                            echo "<tr>";

                                echo "<td>";

                                    echo "<textarea class='content' name='answer_content' rows='2' cols='50'>";

                                    echo "</textarea>";

                                echo "</td>";

                                echo "<td>";

                                    echo "<input class='answer_sub' type='submit' value='回答'>";

                                echo "</td>";

                            echo "</tr>";

                        echo "</table>";

                    echo "</form>";

                    $sql3 = "select * from answers";//获取回答表里的内容，代码位置有误

                    $result3 = mysqli_query($conn,$sql3);

                    if (!$result3){

                        die("Could not select data:" .mysqli_error($conn));
                    }
                    else{

                        while ($row3 = mysqli_fetch_assoc($result3)) {

                            if($row3['matter_id'] == $row2['matter_id']) {
                                $user_id = $row3['answerer'];

                                $answer_content = $row3['answer_content'];

                                $answer_time = $row3['answer_time'];

                                $sql4 = "SELECT * FROM users";//获取昵称

                                $result4 = mysqli_query($conn, $sql4);

                                if (!$result4) {

                                    die("Could not select data:" . mysqli_error($conn));
                                } else {

                                    while ($row4 = mysqli_fetch_assoc($result4)) {

                                        if ($row4['id'] == $user_id) {

                                            $user_name = $row4['nick'];

                                            $user_college = $row4['college'];

                                        }

                                    }
                                }
                                echo "<table class='answerList_tab'>";

                                echo "<tr>";

                                echo "<td>";
                                echo "<i class='icon-thumbs-up'></i>";
                                echo "</td>";

                                echo "<td>";
                                echo $user_name;
                                echo "</td>";

                                echo "<td>";
                                echo $user_college;
                                echo "</td>";

                                echo "<td>";
                                echo $answer_content;
                                echo "</td>";

                                echo "<td>";
                                echo $answer_time;
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

        <div class="raise">

            <form method="post" action="questionRaise.php">

                <table class="raise_tab">

                    <tr>

                        <td><input type="text" name="question_class" placeholder="问题类别"></td>

                    </tr>

                    <tr>

                        <td><textarea class="content" rows="7" cols="40" name="question_content" placeholder="内容"></textarea></td>

                    </tr>

                    <tr>

                        <td><input class="raise_sub" type="submit" value="提出"></td>

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