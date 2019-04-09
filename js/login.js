document.getElementById("login").onclick = function () {
    var request = new XMLHttpRequest();
    request.open("POST", "login.php");
    var data = "id=" + document.getElementById("id").value
        + "&password=" + document.getElementById("password").value;
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send(data);
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            if (request.status === 200) {
                document.getElementById("result").innerHTML = request.responseText;
                // alert(request.responseText);
            } else {
                alert("发生错误");
            }
        }
    }
}