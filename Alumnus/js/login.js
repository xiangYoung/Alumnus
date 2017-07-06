/**
 * Created by vae on 2017/5/25.
 */
/*邮箱验证*/

function checkEmail() {

    var email = document.getElementById("email").value;

    var email_div = document.getElementById("email_prompt");


    if (email == ""){

        email_div.innerHTML = "Email不能为空";

        return false;
    }

    email_div.innerHTML = "";

    return true;
}


/*密码验证*/

function checkPwd() {

    var pwd = document.getElementById("pwd").value;

    var pwd_div = document.getElementById("pwd_prompt");


    if (pwd == ""){

        pwd_div.innerHTML = "密码不能为空";

        return false;

    }

    pwd_div.innerHTML = "";

    return true;

}

/*验证*/
function confirm() {

    if (checkEmail() && checkPwd()){

        return true;

    }

    else{

        return false;

    }
}