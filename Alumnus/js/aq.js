/**
 * Created by vae on 2017/6/10.
 */

//点击回答
$(function () {

    $('.answer').click(function () {

        if ($('.answer_form').is(':hidden')){

            $('.answer_form').slideDown('slow');

            $(this).text('收起');

            $('.icon-comment-alt').attr("class","icon-comment");
        }

        else{

            $('.answer_form').slideUp('slow');

            $(this).text('回答');

            $('.icon-comment').attr("class","icon-comment-alt");
        }

    });

});

//点击关注图标
$(function () {

    $('.attention').click(function () {

            $('.icon-star-empty').attr("class","icon-star");
        })
});
