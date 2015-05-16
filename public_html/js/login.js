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

        xmlhttp.open("GET", "http://localhost/js/getuser.php?q=" + str, true);
        xmlhttp.send();
    }
}