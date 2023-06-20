<?php

  $errors = array('email' => '', 'firstName' => '', 'lastName' => '');
   // connect to database
  $conn = mysqli_connect('localhost', 'Sam', '1234', 'capstone1');

   //check connection
  if(!$conn){
     echo 'failed';
   }
 
 if(isset($_POST['submit'])){
   $firstName = $_POST['first-name'];
    if(empty($_POST['first-name'])){
      echo "error, empty first name";
    } else { 
      if(!preg_match('/^[a-zA-Z\s]+$/', $firstName)){
        $errors['firstName'] = 'first name must be letters and spaces only';
      }
    }

    $lastName = $_POST['last-name'];
    if(empty($_POST['last-name'])){
      echo "error, empty last name";
    } else { 
      if(!preg_match('/^[a-zA-Z\s]+$/', $lastName)){
        $errors['lastName'] = 'last name must be letters and spaces only';
      }
    }

    $email = $_POST ['email'];
    if(empty($_POST['email'])){
      echo "error, empty email";
    } else { 
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo 'Email must be a valid email address';
      }
    }

    $password = $_POST['password'];
    if(empty($_POST['password'])){
      echo "error, empty password";
    } else { 
      $password = $_POST['password'];
    }

    if(empty($_POST['username'])){
      echo "error, empty username";
    } else { 
    }

    $biography = $_POST['biography'];
    if(empty($_POST['biography'])){
      echo "error, empty biography";
    } else { 
      $biography = $_POST['biography'];
    }

    $yearArray = $_POST['year'];
    foreach($yearArray as $year){
      
    }

    $hobbieArray = $_POST['hobbies'];
    $selectedHobbies = "";
    foreach($hobbieArray as $hobbies){
      $selectedHobbies .= $hobbies . ',';
    }

    $clubArray = $_POST['clubs'];
    $selectedClubs = "";
    foreach($clubArray as $clubs){
      $selectedClubs .= $clubs . ',';
    }

    $sportArray = $_POST['sports'];
    $selectedSports = "";
    foreach($sportArray as $sports){
      $selectedSports .= $sports . ',';
    }

    $instagram = "";
    if(!(empty($_POST['instagram']))){
      $instagram = $_POST['instagram'];

    }
    $facebook = "";
    if(!empty($_POST['facebook'])){
      $facebook = $_POST['facebook'];
    }
    $discord = "";
    if(!empty($_POST['discord'])){
      $discord = $_POST['discord']; 
    }

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'png', 'jpeg');

    $fileDestination = "";
    if(in_array($fileActualExt, $allowed)){
      if($fileError === 0){
        if ($fileSize < 1000000){
          $fileNameNew = uniqid('', true) . "." . $fileActualExt;
          $fileDestination = 'uploads/' . $fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
        }else{
          echo "file is too large";
        }
      } else {
        echo "Error, uploading file";
      }
    } else {
      echo "Error, invalid upload type";
    }


$escapedBiography = mysqli_real_escape_string($conn, $biography);

    if(array_filter($errors)){
      echo ' errors in the form';
    } else {
      $sql = "INSERT INTO users(first_name, last_name, email, password, biography, year, hobbies, clubs, sports, pfp_location, user_discord, user_instagram, user_facebook)
       VALUES('$firstName', '$lastName', '$email', '$password', '$escapedBiography', '$year', '$selectedHobbies', '$selectedClubs', '$selectedSports', '$fileDestination', '$discord', '$instagram', '$facebook')";
    
      if(mysqli_query($conn, $sql)){
        // header('Location: index.php');
      }else{
        echo 'did not work';
      }
  
    }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forms.css">
    <script src="js/forms.js" defer></script>
    <title>Document</title>
</head>
<body>

    <header>
    <div class="container">
          <a class="title" href="index.php"><img class= "logo" src="images/FHlogo.png"> <h2>FH Central</h2></a>  
          <div class="buttons">

          </div>
        </div>
    </header>  
    <div class = "login-container"> 
        <div class="login-square">
            <h2>Sign Up</h2>
            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first-name" placeholder="Enter your first name">
                <div><?php echo $errors['firstName'] ?></div> 
              </div>
              <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last-name" placeholder="Enter your last name">
                <div><?php echo $errors['lastName'] ?></div>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address">
                <div><?php echo $errors['email'] ?></div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
              </div>
              <div class="form-group">
                <label for="biography">Biography</label>
                <textarea type="biography" id="biography" name="biography" placeholder="Tell us about yourself"
                 cols="43" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="grade">Grade:</label>
                <div class="checkbox-group">
                  <label for="year1"><input type="checkbox" id="year1" name="year[]" value="Grade 8"> 8</label>
                  <label for="year2"><input type="checkbox" id="year2" name="year[]" value="Grade 9"> 9</label>
                  <label for="year3"><input type="checkbox" id="year3" name="year[]" value="Grade 10"> 10</label>
                  <label for="year4"><input type="checkbox" id="year4" name="year[]" value="Grade 11"> 11</label>
                  <label for="year5"><input type="checkbox" id="year5" name="year[]" value="Grade 12"> 12</label>
                </div>
              </div>
              <div class="form-group">
                <label for="hobbies">Hobbies:</label>
                <div class="checkbox-group">
                  <label for="hobby1"><input type="checkbox" id="hobby1" name="hobbies[]" value="Draw"> Draw</label>
                  <label for="hobby2"><input type="checkbox" id="hobby2" name="hobbies[]" value="Music"> Music</label>
                  <label for="hobby3"><input type="checkbox" id="hobby3" name="hobbies[]" value="Video Games"> Video Games</label>
                  <label for="hobby4"><input type="checkbox" id="hobby4" name="hobbies[]" value="Movies"> Movies</label>
                  <label for="hobby5"><input type="checkbox" id="hobby5" name="hobbies[]" value="Cooking"> Cooking</label>
                  <label for="hobby6"><input type="checkbox" id="hobby6" name="hobbies[]" value="Photography"> Photography</label>
                </div>
              </div>
              <div class="form-group">
                <label for="clubs">Clubs:</label>
                <div class="checkbox-group">
                  <label for="club1"><input type="checkbox" id="club1" name="clubs[]" value="Environment"> Environment</label>
                  <label for="club2"><input type="checkbox" id="club2" name="clubs[]" value="Trivia"> Trivia</label>
                  <label for="club3"><input type="checkbox" id="club3" name="clubs[]" value="LEO"> LEO</label>
                  <label for="club4"><input type="checkbox" id="club4" name="clubs[]" value="Red Cross"> Red Cross</label>
                  <label for="club5"><input type="checkbox" id="club5" name="clubs[]" value="Esports"> Esports</label>
                  <label for="club6"><input type="checkbox" id="club6" name="clubs[]" value="Science"> Science</label>
                </div>
              </div>
              <div class="form-group">
                <label for="sports">Sports:</label>
                <div class="checkbox-group">
                  <label for="sport1"><input type="checkbox" id="sport1" name="sports[]" value="Golf"> Golf</label>
                  <label for="sport2"><input type="checkbox" id="sport2" name="sports[]" value="Tennis"> Tennis</label>
                  <label for="sport3"><input type="checkbox" id="sport3" name="sports[]" value="Badminton"> Badminton</label>
                  <label for="sport4"><input type="checkbox" id="sport4" name="sports[]" value="Track"> Track</label>
                  <label for="sport5"><input type="checkbox" id="sport5" name="sports[]" value="Swimming"> Swimming</label>
                  <label for="sport6"><input type="checkbox" id="sport6" name="sports[]" value="Hockey"> Hockey</label>
                </div>
              </div>
              <div class="form-group">
                <label for="socials">Social Media:</label>
                <div class="socials-group">
                  <label>
                    <input type="checkbox" name="socials[]" value="" onchange="toggleInput(this)">
                    Instagram
                  </label>
                  <div class="checkbox-input">
                    <input type="text" id="socials-input" name="instagram" placeholder="" disabled>
                  </div>
                  <label>
                    <input type="checkbox" name="socials[]" value="socials 2" onchange="toggleInput(this)">
                    Facebook
                  </label>
                  <div class="checkbox-input">
                    <input type="text" id="socials2-input" name="facebook" placeholder="" disabled>
                  </div>
                  <label>
                    <input type="checkbox" name="socials[]" value="socials 3" onchange="toggleInput(this)">
                    Discord
                  </label>
                  <div class="checkbox-input">
                    <input type="text" id="socials-input" name="discord" placeholder="" disabled>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="file">Profile picture</label>
                <input type="file" id="file" name="file">
              </div>
              <div class="form-group">
                <button type="submit" name="submit" value="submit">Sign Up</button>
              </div>
            </form>
          </div>
    </div> 
</body>
</html>