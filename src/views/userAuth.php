<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../src/views/css/style.css">
</head>
<body>
    <h1>авторизация</h1>
    <input type="text" placeholder="login" id="login"> <br>
    
    <input type="text" placeholder="password" id="pass"> <br>
    <button id="regBtn">Войти</button>

    <script>

        let btn = document.getElementById("regBtn")

        btn.addEventListener("click", ()=> {
            let login = document.getElementById("login").value;
            
            let pass = document.getElementById("pass").value;
            
            let resp = JSON.stringify({
                "login":login,
                "pass":pass,
                
            });


            fetch('http://proekt/api/auth', {
                method: 'POST',
                body: resp
            })
                .then(response => response.json())

                .then(data => {
                    if(data.status == "ok") {
                        localStorage.setItem("at", data.payload.accessToken);
                        window.location.replace("http://proekt/ul");
                    }
                    console.log(data);
                })
                .catch(error => {
                    console.log(error);
                })
            })

    </script>


</body>
</html>