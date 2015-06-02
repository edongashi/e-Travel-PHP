function showUser(str) {
    if (str == "") {
        document.getElementById("user_search").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("user_search").innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open("GET", "/api/getuser.php?user=" + str, true);
        xmlhttp.send();
    }
}

function showPassword(str) {
    if (str == "") {
        document.getElementById("password_check").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("password_check").innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open("GET", "/api/check_password.php?pass=" + str, true);
        xmlhttp.send();
    }
}