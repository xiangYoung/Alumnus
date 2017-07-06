/**
 * Created by vae on 2017/6/11.
 */
//点击评论
$(function () {

    $('.comment').click(function () {

        if ($('.comment_form').is(':hidden')){

            $('.comment_form').slideDown('slow');

            $(this).text('收起');

            $('.icon-comment-alt').attr("class","icon-comment");
        }

        else{

            $('.comment_form').slideUp('slow');

            $(this).text('评论');

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

//点击赞同图标
$(function () {

    $('.love').click(function () {

        $('.icon-heart-empty').attr("class","icon-heart");
    })
});