/**
 * Created by vae on 2017/4/13.
 */
/*function $(elementId) {

    return document.getElementById(elementId).value;

}

function divId(elementId) {

    return document.getElementById(elementId);

}*/

/*用户名验证*/

function checkUser() {

    var user = document.getElementById("user").value;

    var user_div = document.getElementById("user_prompt");

    var reg = /^[a-zA-Z][a-zA-Z0-9]{3,15}$/ | /[\w\u4e00-\u9fa5]/;

    if(user == ""){

        user_div.innerHTML = "用户名不能为空";

        return false;
    }

    if(reg.test(user) == false){

        user_div.innerHTML = "用户名格式不正确";

        return false;
    }

    user_div.innerHTML = "";

    return true;

}


/*邮箱验证*/

function checkEmail() {

    var email = document.getElementById("email").value;

    var email_div = document.getElementById("email_prompt");

    var reg = /^\w+@\w+(\.[a-zA-Z]{2,3}){1,2}$/;

    if (email == ""){

        email_div.innerHTML = "Email不能为空";

        return false;
    }

    if (reg.test(email) == false){

        email_div.innerHTML = "Email格式不正确，例如Netease@yeah.net";

        return false;
    }

    email_div.innerHTML = "";

    return true;
}


/*密码验证*/

function checkPwd() {

    var pwd = document.getElementById("pwd").value;

    var pwd_div = document.getElementById("pwd_prompt");


    var reg=/^[a-zA-Z0-9]{6,16}$/;

    if (pwd == ""){

        pwd_div.innerHTML = "密码不能为空";

        return false;

    }

    if (reg.test(pwd) == false){

        pwd_div.innerHTML = "密码不能含有非法字符，长度在6-16之间";

        return false;

    }

    pwd_div.innerHTML = "";

    return true;

}

/*密码确认*/

function verifyPwd() {

    var pwd = document.getElementById("pwd").value;

    var verify = document.getElementById("verify").value;

    var verify_prompt = document.getElementById("verify_prompt");

    if (pwd != verify){

        verify_prompt.innerHTML = "密码不一致";

        return false;
    }

    verify_prompt.innerHTML = "";

    return true;
}



/*专业验证*/

function checkMajor() {

    var major = document.getElementById("major").value;

    var major_div = document.getElementById("major_prompt");

    if (major == ""){

        major_div.innerHTML = "专业不能为空";

        return false;
    }

    major_div.innerHTML = "";

    return true;
}

/*最终验证都正确与否 当用户信息填写不完整又点了注册按钮如何保证继续停留在页面，不提交数据*/

function confirm() {

    if (checkUser() && checkEmail() && checkPwd() && verifyPwd() && checkMajor()){

       return true;

    }

    else{

        return false;

        //window.location.href = "register.html";

    }
}