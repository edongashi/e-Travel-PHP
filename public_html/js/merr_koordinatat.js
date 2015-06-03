function lexoKoordinatat(lokacioni, callback, callbackError) {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            try {
                var koordinatat = xmlhttp.responseXML.documentElement;
                
                var gjeresia = koordinatat.getElementsByTagName("gjeresia")[0].firstChild.nodeValue;
                var gjatesia = koordinatat.getElementsByTagName("gjatesia")[0].firstChild.nodeValue;
                callback(gjeresia, gjatesia);
            } catch (e) {
                callbackError();
            }
        } else {
            callbackError();
        }
    }

    xmlhttp.open("GET", "/api/merr_koordinatat.php?lokacioni=" + lokacioni, true);
    xmlhttp.send();
}