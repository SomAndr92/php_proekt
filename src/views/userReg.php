<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../src/views/css/style.css">
</head>
<body>
    <input type="text" placeholder="login" id="login"> <br>
    <input type="text" placeholder="name" id="name"> <br>
    <input type="text" placeholder="password" id="pass"> <br>
    <button class="but1" id="regBtn">reg</button>

    <script>

        let btn = document.getElementById("regBtn")

        btn.addEventListener("click", ()=> {
            let login = document.getElementById("login").value;
            let name = document.getElementById("name").value;
            let pass = document.getElementById("pass").value;
            
            let resp = JSON.stringify({
                "login":login,
                "pass":pass,
                "name":name
            });


            fetch('http://proekt/api/reg', {
                method: 'POST',
                body: resp
            })
                .then(response => response.json())

                .then(data => {
                    if(data.status == "ok") {
                        alert("ok");
                    }
                })
                .catch(error => {
                    console.log(error);
                })
            })

    </script>


</body>
</html>