<!-- Anderson Giang and Phillip Tran-->
<!DOCTYPE html>
<head>
    <title>Lab4</title>

    <style>
        body {
            background-color: #1d242c;
            color: #dce2e8;
            font-size: 10.5pt;
        }
        .form-control {
            width: 350px;
            border-radius: 6px;
            height:25px;
            padding-left: 3px;
            margin-bottom: 25px;
            margin-left: 115px;
        }

        .logInBox, #login{
            text-align:center;
        }

        em {
            font-size: 8.5pt;
            position: relative;
            left:13px;
            top: -30px;
            color: red;
            float:left;
            padding-left:100px;
        }

        .form-control:focus {
            border-color: #C54798;
        }

        label {
            float:left;
            font-weight: 400;
            margin-right: 9px;
            margin-top:5px;
            padding-left: 25px;
            position: absolute;
        }

        textarea {
            margin-top: 20px;
            box-sizing: border-box;
            margin-top: 0;
        }

        body {
            font-family: "Open Sans", "Helvetica";
        }

        #aform {
            padding-top: 45px;
            border-radius: 15px;
            box-sizing: border-box;
            width: 600px;
            height:550px;
            padding-left: 25px;
            margin: 0 auto;
            position: relative;
            top: 220px;
            background-color:#3a4552;
        }

        .button {
            background-color: #C54798;
            border: none;
            border-radius: 10px;
            padding:10px;
            text-align: center;
            position: relative;
            left:225px;
            margin-top: 8px;
        }
        .loginButton{
         background-color: #C54798;
                    border: none;
                    border-radius: 10px;
                    padding:10px;
        }

        #notdigit {
            position: relative;
            left:-243px;
            line-height: 25px;
        }

        #bio {
            height:100px;
        }
		
		h1{
		text-align:center;
		}

    </style>


    <script type="text/javascript">

        var firstName;
        var lastName;
        var counter = 0;

        function init() {
            var form = document.getElementById("aform");
            form.addEventListener("submit", checkValidation, false);
			document.getElementById("pwd").addEventListener("change", checkPassword ,false);
        }

        function checkValidation(event) {
            //event.preventDefault()
            counter =0;
            checkPassword();
            checkFirstName();
            checkLastName();

            //check for user for the login
            //checkForUser();
            if (counter === 3) {
                document.body.style.backgroundColor = " #1d242c";
                //alert(firstName + "\n" + lastName + "\n" + "Your form submission was successful.");
                counter = 0;
            }
            else {
                document.body.style.backgroundColor = "#fff";
                counter = 0;
                event.preventDefault();
            }
        }
		
		function checkPassword(){
		    var password = document.getElementById("pwd").value;
		    if(!(password.match(/[\$\\\/\!\@\#\%\^\&\*\(\)\-\_\=\`\~\[\{\]\}\;\:\'\"\,\.\<\>\?]/gi) && password.match(/[\d]/gi) &&
                               password.length > 5)){
                document.getElementById("pwdError").innerHTML= "Password did not meet the security requirement of one number, one special character, and at least 5 chars";
		    }
		    else{
		    counter++;
		    }
		}
		
        function checkFirstName() {
            var ele = document.getElementById("noupF");
            var cap = document.getElementById("all-lettersF");
            firstName = document.getElementById("fname").value;
            //both errors, no cap first letter and name contains a number
            if (firstName[0] === firstName[0].toLowerCase() && !(/^[a-zA-Z]+$/.test(firstName))) {
                ele.innerHTML = "*First letter of your first name must be capitalized.";
                cap.innerHTML = "*First name must contain all letters.";
            }
            //one error, no cap first letter and name does not contain a number
            else if (firstName[0] === firstName[0].toLowerCase() && (/^[a-zA-Z]+$/.test(firstName))) {
                ele.innerHTML = "*First letter of your first name must be capitalized.";
            }
            //one error, cap first letter and name contains a number
            else if (firstName[0] !== firstName[0].toLowerCase() && !(/^[a-zA-Z]+$/.test(firstName))) {
                cap.innerHTML = "*First name must contain all letters.";
            }

            else {
                ele.innerHTML = "";
                cap.innerHTML = "";
                counter++;
            }
        }

        function checkLastName() {
            var ele = document.getElementById("noupL");
            var cap = document.getElementById("all-lettersL");
            lastName = document.getElementById("lname").value;
            if (lastName[0] === lastName[0].toLowerCase() && !(/^[a-zA-Z]+$/.test(lastName))) {
                ele.innerHTML = "*First letter of your last name must be captilized.";
                cap.innerHTML = "*Last name must contain all letters.";
            }
            else if (lastName[0] === lastName[0].toLowerCase() && (/^[a-zA-Z]+$/.test(lastName))) {
                ele.innerHTML = "*First letter of your last name must be capitalized.";
            }

            else if (lastName[0] !== lastName[0].toLowerCase() && !(/^[a-zA-Z]+$/.test(lastName))) {
                cap.innerHTML = "*Last name must contain all letters.";
            }

            else {
                ele.innerHTML = "";
                cap.innerHTML = "";
                counter++;
            }
        }

        window.addEventListener("load", init, false);

    </script>


</head>
<body>
<h1>Registration </h1>
<form action="login.php" method="post">
    <div id="login">
        <h2>Login</h2>
        <div class="logInBox"id="login">
        <!--kaplan says ok for email instead of userName -->
            <label>Email</label>
            <input id="email" name="loginEmail"class="form-control" type="email" value="" placeholder="email" required>
            <label>Password</label>
            <input id="pwdLogin" name="pwdLogin" class="form-control" type="password" value="" placeholder="password" required>
            <input class="loginButton" type="submit" value="login">
            <p><em id="pwdErrorLogin"></em><p>
        </div>
    </div>
</form>
<div id="myContainer">
    <form id="aform" action="" method="post">
        <div class="form-group">
            <label for="fname">First Name</label>
            <input id="fname" class="form-control" type="text" name="fname" placeholder="First Name" required>
            <p><em id="noupF"></em></p>
            <p><em id="all-lettersF"></em></p>
        </div>
        <br>
        <div class="form-group">
            <label for="name">Last Name</label>
            <input id="lname" class="form-control" type="text" name="lname" value="" placeholder="Last Name" required>
            <p><em id="noupL"></em></p>
            <p><em id="all-lettersL"></em></p>
        </div>
        <br>
		<div class="form-group">
			<label class="email" for="email">Email</label>
			<input type="email" name="email" class="form-control" value="" placeholder="Email" required></input>
		</div>
		<br>
		<div class ="form-group">
			<label class = "labels" for="pwd" > Password</label>
			<input id="pwd" type="password" name="pwd" class="form-control" value="" placeholder="password" required>
		    <p><em id="pwdError"></em></p>
		</div>
        <br>
			<input class="button" type="submit" name="" value="Submit" placeholder="">
			<!--input class="button" type="button" name="login" value="login" placeholder=""-->
    </form>
</div>
<?php
    //check if variable exist
    //register

        if(!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["email"]) && !empty($_POST["pwd"])){

            $userName = "root";
            $localHost = "localhost:3306";
            $password = "";
            $database = "lab4";

            $connection = new mysqli($localHost, $userName, $password, $database);
            //check connection
            if($connection -> connect_errno){
                echo("<script>console.log('PHP: ".$connection."');</script>");
            }
            $fname = mysqli_real_escape_string($connection, $_POST["fname"]);
            $lname = mysqli_real_escape_string($connection, $_POST["lname"]);
            $email = mysqli_real_escape_string($connection, $_POST["email"]);
            $pwd = mysqli_real_escape_string($connection, $_POST["pwd"]);
            $queryUser = "SELECT COUNT(*) FROM user WHERE email = '$email' ";
            $checkUser = mysqli_query($connection, $queryUser);
            $dataCheck = mysqli_fetch_array($checkUser, MYSQLI_NUM);
            if($dataCheck[0] > 1)
            {
                echo "already Exist";
            }
            else{
                $salt = openssl_random_pseudo_bytes(32);
                $pwdAppend = $salt . $pwd;
                $newPwd = hash("sha512", $pwdAppend);
                $query = "INSERT into user(fname, lname, email, pwd, salt) VALUES ('$fname', '$lname', '$email','$newPwd', '$salt')";
                $result = mysqli_query($connection,$query);
            }
            //debug
            if(!$result){
                echo("<script>console.log('PHP: ".$result."');</script>");
            }
        }
        else{
            echo "";
        }
    //login
    //if(!empty($_POST[""])){
    //}
?>
</body>
</html>