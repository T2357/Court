<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"  />
    <meta name ="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
   <div class="form">
       <div class="form-box">
           <div class="button-box">
               <div id="btn"></div>
               <button type="button" class="toggle-btn" onclick="login()"><b>Login<b>
              </button>
              <button type="button" class="toggle-btn" onclick="register()"><b>Register<b>
            </button>
            </div>
            <form id="login" class="input-group" action="validation.php" method="POST"><p>For Advocates</p>
                <input type="text" class="input-field"
                placeholder="Email" required name="EMAIL">
                <input type="password" class="input-field"
                placeholder="Password" required name="PASSWORD"> 
                <input type="checkbox" name="checkbox"
                class="check-box">
                <label for="checkbox">Remember Password</label>
                <button type="submit" class="submit-btn">Login</button>
              </form>
              <form class="clientlogin" class="input-group" action="cli.php" method="POST"><p>For Clients</p>
                <input type="text" class="input-field"
                placeholder="Email" required name="EMAIL">
                <input type="password" class="input-field"
                placeholder="Password" required name="PASSWORD"> 
                <input type="checkbox" name="checkbox"
                class="check-box">
                <label for="checkbox">Remember Password</label>
                <button type="submit" class="submit-btn">Login</button>
              </form>
              <form id="register" class="input-group">
                <button type="menu"class="menu-btn1" ><a href="advocate.php">For Advocate</a></button><br><br><br>
                 <button type="menu" class="menu-btn2" ><a href="client.php">For Client</a></button>
              </form>
      <script src="login.js"></script>
</body>
</html>