/**
 * Created by vae on 2017/5/1.
 */

//滑动显示隐藏块

$(function () {

                $(".group").hide();

                $(".icon").hover(function () {

                    $(".group").show();

                },function () {

                    $(".group").show();

                })

                // 鼠标移动到group的div上的时候group div不会被隐藏

                $(".group").hover(function () {

                    $(".group").show();

                }, function () {

                    $(".group").hide();

                })

            });

//个人资料

            $(function () {

                $('.edit_person').click(function () {

                    if ($('#person_form').is(':hidden')){

                        $('#person_form').slideDown('slow');

            $(this).text('收起');

            $('#person_data .icon-double-angle-down').attr("class","icon-double-angle-up");
        }

        else{

            $('#person_form').slideUp('slow');

            $(this).text('编辑');

            $('#person_data .icon-double-angle-up').attr("class","icon-double-angle-down");
        }

    });

});

//头像上传

$(function () {

    $('.edit_icon').click(function () {

        if ($('#icon_form').is(':hidden')){

            $('#icon_form').slideDown('slow');

            $(this).text('收起');

            $('#set_icon .icon-double-angle-down').attr("class","icon-double-angle-up");
        }

        else{

            $('#icon_form').slideUp('slow');

            $(this).text('编辑');

            $('#set_icon .icon-double-angle-up').attr("class","icon-double-angle-down");
        }

    });

});

//登陆邮箱

$(function () {

    $('.edit_email').click(function () {

        if ($('#email_form').is(':hidden')){

            $('#email_form').slideDown('slow');

            $(this).text('收起');

            $('#set_email .icon-double-angle-down').attr("class","icon-double-angle-up");
        }

        else{

            $('#email_form').slideUp('slow');

            $(this).text('编辑');

            $('#set_email .icon-double-angle-up').attr("class","icon-double-angle-down");
        }

    });

});

//绑定手机

$(function () {

    $('.edit_phone').click(function () {

        if ($('#phone_form').is(':hidden')){

            $('#phone_form').slideDown('slow');

            $(this).text('收起');

            $('#set_phone .icon-double-angle-down').attr("class","icon-double-angle-up");
        }

        else{

            $('#phone_form').slideUp('slow');

            $(this).text('编辑');

            $('#set_phone .icon-double-angle-up').attr("class","icon-double-angle-down");
        }

    });

});

//密码更改

$(function () {

    $('.edit_pwd').click(function () {

        if ($('#pwd_form').is(':hidden')){

            $('#pwd_form').slideDown('slow');

            $(this).text('收起');

            $('#set_pwd .icon-double-angle-down').attr("class","icon-double-angle-up");
        }

        else{

            $('#pwd_form').slideUp('slow');

            $(this).text('编辑');

            $('#set_pwd .icon-double-angle-up').attr("class","icon-double-angle-down");
        }

    });

});