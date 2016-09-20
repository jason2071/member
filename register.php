
<html>
    <head>
        <meta charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register for Member</title>
        
        <link rel="stylesheet" href="bootstap/css/bootstrap.min.css">
        <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="bootstap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="signin.css">
    </head>
    
    <body>
        <div class="container">
            <form name="form1" method="POST" class="form-signin" action="for_register.php">
                <h2 class="form-signin-heading">For All</h2>
                
                <label>Username<span>(*)</span> :</label>
                <input class="form-control" type="text" name="uName" id="uName" pattern="[A-Za-z0-9]{3,}" required autofocus/>

                <label>Password<span>(*)</span> :</label>
                <input id="password" name="password" type="password" pattern="^\S{3,}$" class="form-control" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 3 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" required>
                
                <label>Re-Password<span>(*)</span> :</label>
                <input id="password_two" name="password_two" type="password"  class="form-control" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required>



                <label>ชื่อ <span>(*)</span> :</label>
                <input class="form-control" type="text" name="firstName" id="firstName" required />
                
                <label>นามสกุล <span>(*)</span> :</label>
                <input class="form-control" type="text" name="lastName" id="lastName" required />
                
                <label>อายุ :</label>
                <input class="form-control" type="text" name="age" id="age"/>
                
                <label>เพศ :</label>
                <p>
                    <label>
                        <input type="radio"name="gender" value="male" id="gender_0" checked/>ชาย
                    </label><br>
                    <label>
                        <input type="radio"name="gender" value="female" id="gender_1"/>หญิง
                    </label>
                </p>
                
                <label>เบอร์มือถิอ :</label>
                <input class="form-control" type="text" name="phone" id="phone"/>
                
                <label>E-mail :</label>
                <input class="form-control" type="text" name="mail" id="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"/>
                <br>
                <button class="btn btn-primary" type="submit" id="btnRegister">สมัครสมาชิก !</button>
                <a class="btn btn-default" href="index.php">กลับหน้าหลัก</a>
                
            </form>
        </div>
    </body>
</html>