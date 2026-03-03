<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }  
        h2{
            color: #333;
            text-align: center;
        }
        form{
            border: 2px solid #ccc;
            padding: 10px;
            border-radius: 5px;   
            text-align: center; 
            width: 70%;
            margin:20px auto;


        }
            input[type="text"], input[type="password"], textarea, select {
                width: 300px;
                padding: 10px;
                margin: 5px 0;
                border: 1px solid #ccc;
                border-radius: 4px; 
        }


         </style>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<h2>Registration Form</h2>

<form action="insert.php" method="POST">

    First Name:
    <input type="text" name="fname"><br><br>

    Last Name:
    <input type="text" name="lname"><br><br>

    Address:
    <textarea name="address"></textarea><br><br>

    Country:
    <select name="country">
        <option value="">Select Country</option>
        <option value="Egypt">Egypt</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
    </select><br><br>

    Gender:
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
    <br><br>

    Skills:<br>
    <input type="checkbox" name="skills[]" value="JS"> JS
    <input type="checkbox" name="skills[]" value="React"> React
    <input type="checkbox" name="skills[]" value="nodeJs"> nodeJs
    <input type="checkbox" name="skills[]" value="Tailwind"> Tailwind
    <br><br>

    Username:
    <input type="text" name="username"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    Department:
    <input type="text" name="department" value="Open Source" readonly><br><br>
    <p>please insert code the below box</p>

    Code:
    <input type="text" name="code"><br><br>

    <input type="submit" value="Submit">
    <input type="reset" value="Reset">

</form>

<script>
    const codeInput = document.querySelector('input[name="code"]');
    const submitButton = document.querySelector('input[type="submit"]');
    const verificationCode = "Sh68Sa";

    submitButton.addEventListener('click', function(event) {
        if (codeInput.value !== verificationCode) {
            event.preventDefault();
            alert("Incorrect verification code. Please try again.");
        }
    });
    </script>
</body>
</html>