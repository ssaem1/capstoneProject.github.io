
<?php

  // connect to database
  $conn = mysqli_connect('localhost', 'Sam', '1234', 'capstone1');

  //check connection
  if(!$conn){
    echo 'failed';
  }

  $sql = 'SELECT first_name,
      last_name,
      id,
      biography,
      year,
      hobbies, 
      clubs,
      sports,
      pfp_location,
      user_discord,
      user_instagram, 
      user_facebook
      FROM users';

  $year_sql = 'SELECT id, title, description, cover_photo ,location, grade_link, grade_pfp FROM grade';
  $year_result = mysqli_query($conn, $year_sql);
  $yearss = mysqli_fetch_all($year_result, MYSQLI_ASSOC);
  mysqli_free_result($year_result);

  $club_sql = 'SELECT club_id, club_title, club_description, club_cover_photo, club_location, club_link, club_pfp FROM clubs';
  $club_result = mysqli_query($conn, $club_sql);
  $clubss = mysqli_fetch_all($club_result, MYSQLI_ASSOC);
  mysqli_free_result($club_result);

  $sport_sql = 'SELECT sport_id, sport_title, sport_description, sport_cover_photo, sport_location, sport_link, sports_pfp FROM sports';
  $sport_result = mysqli_query($conn, $sport_sql);
  $sportss = mysqli_fetch_all($sport_result, MYSQLI_ASSOC);
  mysqli_free_result($sport_result);

  $hobbie_sql = 'SELECT hobbie_id, hobbie_title, hobbie_description, hobbie_cover_photo, hobbie_location, hobbie_link, hobbie_pfp FROM hobbies';
  $hobbie_result = mysqli_query($conn, $hobbie_sql);
  $hobbiess = mysqli_fetch_all($hobbie_result, MYSQLI_ASSOC);
  mysqli_free_result($hobbie_result);


  $result = mysqli_query($conn, $sql);

  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // free memory
  mysqli_free_result($result);

  // close connention
  mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/grades.css">
    <script src="../js/home.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <title>Capstone</title>
</head>
<body>
    <header>
        <div class="container">
          <a class="title" href="../index.php"><img class= "logo" src="../images/FHlogo.png"> <h2>FH Central</h2></a>  
          <div class="buttons">
            <a href="../signup.php"><button class="signup">Add User</button></a>
          </div>
        </div>
    </header>   
    <div class="swiper-container">
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              <?php 
              echo "<div class=\"swiper-slide\"><img src=\"../images/cover/" .  $hobbiess[4]['hobbie_cover_photo'] . "\"></div>"; ?>
              ...
            </div>
          </div>
    </div>  
    <div class="content-container">
      <div class="side-bar">
        <div class="description">
          <?php echo "<h1>" . $hobbiess[4]['hobbie_title'] . "</h1>" ?>
          <?php echo "<p>" . $hobbiess[4]['hobbie_description'] . "</p>"; ?>
        </div>
        <div class="tabs" id="grade">
          <?php foreach($hobbiess as $hobbie) {
            echo "<a href=\"../templates/" . $hobbie['hobbie_link'] . "\" class=\"side-tabs\">"; 
              echo "<img src=\" ../images/icons/" . $hobbie['hobbie_pfp'] .  "\" alt=\"Profile Image\">" ?>
              <h3><?php echo $hobbie['hobbie_title']; ?></h3>
              <?php echo "</a>";
             }?>
          </div>
      </div>
      <div class="members">
        <div class="profile-container">
          <?php foreach($users as $user) { 
            $hobbies = explode(',',  $user['hobbies']);
            if(in_array("Cooking", $hobbies)){?>
            <div class="profile">
            <?php echo " <img class=\"pfp\" src=\"../" . $user['pfp_location'] . "\" alt=\"Profile Picture\">"; ?>
            <div class="profile-details">
                <h2><?php echo htmlspecialchars($user['first_name'] . " ")?><?php echo htmlspecialchars($user['last_name']); ?></h2>
              <div class="tags">
              <?php if($user['year'] != ''){
                for($i = 0; $i < count($yearss); $i++){
                    if($yearss[$i]['title'] == $user['year']){
                      echo "<button class=\"tag\"><a href=\"" . $yearss[$i]['grade_link'] . "\">" . $user['year']  . "</a></button>";
                    }
                  }?>
                <?php }?>
              <?php  
              $clubs = explode(',',  $user['clubs']);
                foreach($clubs as $club) {
                  if($club != ''){
                    for($i = 0; $i < count($clubss); $i++){
                      if($clubss[$i]['club_title'] == $club){
                        echo "<button class=\"tag\"><a href=\"" . $clubss[$i]['club_link'] . "\">" . $club  . "</a></button>";
                      }
                    }?>
                <?php }}?>
              <?php  
              $sports = explode(',',  $user['sports']);
                foreach($sports as $sport) {
                  if($sport != ''){
                    for($i = 0; $i < count($sportss); $i++){
                      if($sportss[$i]['sport_title'] == $sport){
                        echo "<button class=\"tag\"><a href=\"" . $sportss[$i]['sport_link'] . "\">" . $sport  . "</a></button>";
                      }
                    }?>
                <?php }}?>
                <?php $hobbies = explode(',',  $user['hobbies']); 
                foreach($hobbies as $hobbie) {
                  if($hobbie != ''){
                    for($i = 0; $i < count($hobbiess); $i++){
                      if($hobbiess[$i]['hobbie_title'] == $hobbie){
                        echo "<button class=\"tag\"><a href=\"" . $hobbiess[$i]['hobbie_link'] . "\">" . $hobbie  . "</a></button>";
                      }
                    }?>
                <?php }}?>
              </div>
              <p><?php echo htmlspecialchars($user['biography']); ?></p>
            </div>
            <ul class="social-media-list">
              <?php if(!empty($user['user_instagram'])){ ?>
              <li class="social-media-item">
                  <?php echo "<img src=\"../images/instagram-icon.png\" alt=\"Instagram Icon\" class=\"social-media-icon\">";
                  echo "<span class=\"social-media-handle\">" . $user['user_instagram'] . "</span>"; ?>
              </li>
              <?php } ?>
              <?php if(!empty($user['user_facebook'])){ ?>
              <li class="social-media-item">
                  <?php echo "<img src=\"../images/facebook-icon.png\" alt=\"Facebook Icon\" class=\"social-media-icon\">";
                  echo "<span class=\"social-media-handle\">" . $user['user_facebook'] . "</span>"; ?>
              </li>
              <?php } ?>
              <?php if(!empty($user['user_discord'])){ ?>
              <li class="social-media-item">
                  <?php echo "<img src=\"../images/discord-icon.png\" alt=\"Discord Icon\" class=\"social-media-icon\">";
                  echo "<span class=\"social-media-handle\">" . $user['user_discord'] . "</span>"; ?>
              </li>
              <?php } ?>
            </ul>
          </div>
          <?php }}?>
        </div>
      </div>
    </div>
</body>
</html>