<?php
include "../template/header.php";
include "../template/navbar.php";
?>

<head>
    <link rel="stylesheet" href="../../css/general.css">
</head>

<div class="formulir_reg container" style="border-radius: 20px;">
    <div class="text-center" style="color: #fff; background-color: red;">
        <h1>FORMULIR REGISTRASI</h1>
    </div>

    <div class="regis">
        <form method="post" action="../../login/proseslogin.php" name="registerForm" onsubmit="return validateForm()">
            <table>
                <tr>
                    <td><label for="name">Name</label></td>
                    <td><input type="text" id="name" name="name" required class="form-control" list="datalistOptions" id="exampleDataList"></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" id="email" name="email" required class="form-control" list="datalistOptions" id="exampleDataList"></td>
                </tr>
                <tr>
                    <td><label for="email">Level</label></td>
                    <td><input type="text" id="level" name="level" required class="form-control" list="datalistOptions" id="exampleDataList"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" id="password" name="password" required class="form-control" list="datalistOptions" id="exampleDataList"></td>
                </tr>
                <tr>
                    <td><label for="confirm_password">Confirm Password</label></td>
                    <td><input type="password" id="confirm_password" name="confirm_password" required class="form-control" list="datalistOptions" id="exampleDataList"></td>
                </tr>
            </table>
            <input type="submit" name="register" value="Register" class="btn-regis">
        </form>
    </div>
</div>

<script>
    function validateForm() {
    var name = document.forms["registerForm"]["name"].value;
    var email = document.forms["registerForm"]["email"].value;
    var level = document.forms["registerForm"]["level"].value;
    var password = document.forms["registerForm"]["password"].value;
    var confirm_password = document.forms["registerForm"]["confirm_password"].value;
    
    if (name == "") {
        alert("Name must be filled out");
        return false;
    }
    
    if (email == "") {
        alert("Email must be filled out");
        return false;
    }
    if (level == "") {
        alert("isi level user");
        return false;
    }
    
    if (password == "") {
        alert("Password must be filled out");
        return false;
    }
    
    if (confirm_password == "") {
        alert("Confirm Password must be filled out");
        return false;
    }
    
    if (password != confirm_password) {
        alert("Passwords do not match");
        return false;
    }
}

<?php
include "../template/footer.php";
?>