<?php

  // connect to database
  $conn = mysqli_connect('localhost', 'Sam', '1234', 'capstone');

  //check connection
  if(!$conn){
    echo 'failed';
  }

  $user_sql = 'SELECT first_name, last_name, id, biography FROM users';
  $user_result = mysqli_query($conn, $user_sql);
  $users = mysqli_fetch_all($user_result, MYSQLI_ASSOC);

  $year_sql = 'SELECT id, title, description, location, grade_link FROM grade';
  $year_result = mysqli_query($conn, $year_sql);
  $years = mysqli_fetch_all($year_result, MYSQLI_ASSOC);

  $club_sql = 'SELECT club_id, club_title, club_description, club_location, club_link FROM clubs';
  $club_result = mysqli_query($conn, $club_sql);
  $clubs = mysqli_fetch_all($club_result, MYSQLI_ASSOC);

  $sport_sql = 'SELECT sport_id, sport_title, sport_description, sport_location, sport_link FROM sports';
  $sport_result = mysqli_query($conn, $sport_sql);
  $sports = mysqli_fetch_all($sport_result, MYSQLI_ASSOC);

  $hobbie_sql = 'SELECT hobbie_id, hobbie_title, hobbie_description, hobbie_location, hobbie_link FROM hobbies';
  $hobbie_result = mysqli_query($conn, $hobbie_sql);
  $hobbies = mysqli_fetch_all($hobbie_result, MYSQLI_ASSOC);
  // free memory
  mysqli_free_result($user_result);
  mysqli_free_result($year_result);
  mysqli_free_result($club_result);
  mysqli_free_result($sport_result);
  mysqli_free_result($hobbie_result);


  // close connention
  mysqli_close($conn);

  print_r($users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/home.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <title>Capstone</title>
</head>
<body>
    <header>
        <div class="container">
          <h1>Website Title</h1>
          <form class="search-form">
            <input type="text" placeholder="Search...">
            <!-- <button type="submit">Search</button> -->
        </form>
          <div class="buttons">
            <a href="signup.php"><button class="signup">Sign Up</button></a>
            <a href="login.php"><button class="login">Log In</button></a>
          </div>
        </div>
    </header>   
    <div class="swiper-container">
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              <div class="swiper-slide"><img src="images/advertisement.png"></div>
              <div class="swiper-slide"><img src="images/penguin.jpg"></div>
              <div class="swiper-slide"><img src="images/blue.png"></div>
              ...
            </div>
            <!-- If we need pagination -->
            <!-- <div class="swiper-pagination"></div> -->
          
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>   

    <div class="tab-container">
        <div class="tab">
          <button class="tablinks active" onclick="openTab(event, 'grade')">grade</button>
          <button class="tablinks" onclick="openTab(event, 'club')">club</button>
          <button class="tablinks" onclick="openTab(event, 'sport')">sport</button>
          <button class="tablinks" onclick="openTab(event, 'hobby')">hobby</button>
        </div>          
        <div class="tabcontent" id="grade">
          <?php foreach($years as $year) {
            echo "<a href=\"templates/" . $year['grade_link'] . "\" class=\"profile\">"; ?>
              <img src="images/pfp1.jpg" alt="Profile Image">
              <h3><?php echo $year['title']; ?></h3>
              <?php echo "</a>";
             }?>
          </div>
          <div class="tabcontent" id="club">
          <?php foreach($clubs as $club) {
            echo "<a href=\"" . $club['club_link'] . "\" class=\"profile\">"; ?>
              <img src="images/pfp1.jpg" alt="Profile Image">
              <h3><?php echo $club['club_title']; ?></h3>
              <?php echo "</a>";
             }?>
          </div>
          <div class="tabcontent" id="sport">
          <?php foreach($sports as $sport) {
            echo "<a href=\"" . $sport['sport_link'] . "\" class=\"profile\">"; ?>
              <img src="images/pfp1.jpg" alt="Profile Image">
              <h3><?php echo $sport['sport_title']; ?></h3>
              <?php echo "</a>";
             }?>
          </div>
          <div class="tabcontent" id="hobby">
          <?php foreach($hobbies as $hobbie) {
            echo "<a href=\"" . $hobbie['hobbie_link'] . "\" class=\"profile\">"; ?>
              <img src="images/pfp1.jpg" alt="Profile Image">
              <h3><?php echo $hobbie['hobbie_title']; ?></h3>
              <?php echo "</a>";
             }?>
          </div>
    </div>
</body>
</html>