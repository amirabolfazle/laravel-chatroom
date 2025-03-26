<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <pre id="messages">
        </pre>
    </div>
    <input id="text2" name="message">
    <button onclick="send()">Send</button>
    <button onclick="send2()">Reload Chat</button>
    <script>
        function send(){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("messages").innerHTML = this.responseText+"<br><br>";
                }
            xhttp.open("POST", "/save-message");
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            text=document.getElementById('text2').value;
            xhttp.send("_token={{csrf_token()}}&msg="+text);
        }
    </script>
    <script>
        function send2(){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("messages").innerHTML = this.responseText+"<br><br>";
                }
            xhttp.open("GET", "messages.txt");
            xhttp.send();
            
        }
    </script>
</body>
</html>