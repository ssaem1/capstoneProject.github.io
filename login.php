<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forms.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="header-container">
          <h1>Website Title</h1>
          <form class="search-form">
            <input type="text" placeholder="Search...">
            <!-- <button type="submit">Search</button> -->
        </form>
          <div class="buttons">
            <a href="index.php"><button class="signup">Home</button></a>
            <a href="signup.php"><button class="login">Sign Up</button></a>
          </div>
        </div>
    </header>  
    <div class = "login-container"> 
        <div class="login-square">
            <h2>Login</h2>
            <form>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
            </form>
        </div>
    </div> 
</body>
</html>