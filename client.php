<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"  />
    <meta name ="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="client.css">
</head>
<body>
    <div class="form">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                  </div>
      <div class="heading">Client</div>  
    <form id="register" class="input-group" action="cl.php" method="POST">
    <input type="text" class="input-field"
    placeholder="Name" required name="NAME">
    <input type="email" class="input-field"
    placeholder="Email ID" required name="EMAIL">
    <input type="PASSWORD" class="input-field"
    placeholder="CREATE PASSWORD" required name="PASSWORD">
    <input type="checkbox" name="checkbox"
    class="check-box">
    <label for="checkbox">I agree with the Terms and Conditions </label>
     <button type="submit" class="submit-btn">Register</button>
</form>
</body>
</html>