<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Account Setting</title>

    <link rel="stylesheet" type="text/css" href="css/reset.css">

    <link rel="stylesheet" type="text/css" href="css/set_account.css">

    <link rel="stylesheet" type="text/css" href="fontcss/css/font-awesome.css">

    <script src="js/jquery.js" type="text/javascript"></script>

    <script src="js/set_account.js" type="text/javascript"></script>

</head>

<body>

<header>

    <div class="wrapper">

        <img src="img/logo.png" alt="Crafty" class="logo">

        <nav id="nav_menu">

            <ul>

                <li><a href="index.html">家</a></li>

                <li><a href="myAQ.html">我的问答</a></li>

                <li><a href="myActivity.html">我的活动</a></li>

                <li><a href="#">我的兴趣</a></li>

                <li><a href="#">我的关注</a></li>

            </ul>

        </nav>

        <div class="icon">

            <img src="img/person.jpg" alt="icon" id="person_icon">

        </div>

        <div class="group">

            <ul class="action">

                <li><i class="icon-user"></i><a href="homePage.html">我的主页</a></li>

                <li><i class="icon-cog"></i><a href="setAccount.php">帐号设置</a></li>

                <li><i class="icon-signout"></i><a href="index.html">退出</a></li>

            </ul>

        </div>

    </div>

</header><!--  End Header  -->



<section class="billboard">

    <div class="wrapper">

        <div class="caption">

            <p>帐号设置</p>

        </div>

        <table id="person_data">

            <tr>

                <td>个人资料</td>

                <td class="special">

                </td>

                <td><a class="edit_person">编辑</a>&nbsp;<i class="icon-double-angle-down"></i></td>

            </tr>

        </table>

        <form id="person_form" method="post" action="addInfo_setting.php">

            <table>

                <tr>

                    <td>登录名：</td>

                    <td>

                        <?php

                            session_start();

                            echo $_SESSION['user_email'];

                        ?>

                    </td>

                </tr>

                <tr>

                    <td>昵称：</td>

                    <td><input type="text" name="set_name" value="<?php

                        $conn = mysqli_connect("localhost:3306","root","123456","alumnus") or die(mysqli_error($conn));

                        mysqli_set_charset($conn,"utf8");

                        $sql = "select * from users";

                        $result = mysqli_query($conn,$sql);

                        if (!$result){

                            die("Could not select data:" .mysqli_error($conn));
                        }

                        else {

                            while ($row = mysqli_fetch_assoc($result)) {

                                if ($row['email'] == $_SESSION['user_email']) {

                                    $user_name = $row['nick'];

                                }

                            }
                        }

                        echo $user_name;

                        mysqli_close($conn);

                        ?>"></td>

                </tr>

                <tr>

                    <td>所在城市：</td>

                    <td><input type="text" name="set_city"></td>

                </tr>

                <tr>

                    <td>职业：</td>

                    <td><input type="text" name="set_career"></td>

                </tr>


                <tr>

                    <td>关于自己：</td>

                    <td><textarea rows="5" cols="45" name="set_introduce"></textarea></td>

                </tr>

                <tr>

                    <td colspan="2"><input type="submit" class="save" value="保存"></td>

                </tr>

            </table>

        </form>

        <table id="set_icon">

            <tr>

                <td>头像更改</td>

                <td class="special"></td>

                <td><a class="edit_icon">编辑</a>&nbsp;<i class="icon-double-angle-down"></i></td>

            </tr>

        </table>

        <form id="icon_form">

            <table>

                <tr>

                    <td><img src="img/person.jpg" alt="icon"></td>

                    <td><input type="file"  value="上传头像"></td>

                </tr>

            </table>

        </form>

        <table id="set_email">

            <tr>

                <td>登陆邮箱</td>

                <td class="special"></td>

                <td><a class="edit_email">编辑</a>&nbsp;<i class="icon-double-angle-down"></i></td>

            </tr>

        </table>

        <form id="email_form" method="post" action="email_setting.php">

            <table>

                <tr>

                    <td>当前邮箱：</td>

                    <td>

                        <?php

                        echo $_SESSION['user_email'];

                        ?>

                    </td>

                </tr>

                <tr>

                    <td>更换邮箱：</td>

                    <td><input type="text" name="set_email"></td>

                </tr>

                <tr>

                    <td colspan="2"><input type="submit" class="save" value="保存"></td>

                </tr>

            </table>

        </form>

        <table id="set_phone">

            <tr>

                <td>绑定手机</td>

                <td class="special"></td>

                <td><a class="edit_phone">编辑</a>&nbsp;<i class="icon-double-angle-down"></i></td>

            </tr>

        </table>

        <form id="phone_form" method="post" action="phone_setting.php">

            <table>

                <tr>

                    <td>手机号：</td>

                    <td><input type="text" name="set_phone" placeholder="请输入手机号"></td>

                </tr>

                <tr>

                    <td colspan="2"><input type="submit" class="bind_sub" value="绑定手机"></td>

                </tr>

            </table>

        </form>

        <table id="set_pwd">

            <tr>

                <td>密码更改</td>

                <td class="special"></td>

                <td><a class="edit_pwd">编辑</a>&nbsp;<i class="icon-double-angle-down"></i></td>

            </tr>

        </table>

        <form id="pwd_form" method="post" action="pwd_setting.php">

            <table>

                <tr>

                    <td>当前密码：</td>

                    <td>

                        <input type="text" name="current_pwd" value="<?php echo $_SESSION['user_pwd'];?>">

                    </td>

                </tr>

                <tr>

                    <td>新密码：</td>

                    <td><input type="password" name="set_newPwd"></td>

                </tr>

                <tr>

                    <td>确认新密码：</td>

                    <td><input type="password" name="verify_newPwd"></td>

                </tr>

                <tr>

                    <td colspan="2"><input type="submit" class="save" value="保存"></td>

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