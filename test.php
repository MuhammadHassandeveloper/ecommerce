<html>

<body>
    <script>
    function validateform() {
        var name = document.myform.name.value;
        var password = document.myform.password.value;

        if (name == null || name == "") {
            alert("Name can't be blank");
            return false;
        }
        elseif(name.length < 7) {
            alert("name should not be less than 7 characters ");
            return false;
        }
        if (password == "") {
            alert("password cannot be blank");
            return false;

        } else if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            return false;
        }
    }
    </script>

    <body>
        <form name="myform" method="post" action="" onsubmit="return validateform()">
            Name: <input type="text" name="name" minlength="7"><br />
            Password: <input type="password" name="password"><br />
            <input type="submit" value="register">
        </form>
    </body>

</html>