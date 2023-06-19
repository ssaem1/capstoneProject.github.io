
<?php

  // connect to database
  $conn = mysqli_connect('localhost', 'Sam', '1234', 'capstone');

  //check connection
  if(!$conn){
    echo 'failed';
  }

  $sql = 'SELECT first_name, last_name, id, biography, year, hobbies, clubs, sports FROM users';

  $result = mysqli_query($conn, $sql);

  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // free memory
  mysqli_free_result($result);

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
    <link rel="stylesheet" href="css/grades.css">
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
              <div class="swiper-slide"><img src="images/blue.png"></div>
              ...
            </div>
            <!-- If we need pagination -->
            <!-- <div class="swiper-pagination"></div> -->
          
            <!-- If we need navigation buttons -->
          </div>
    </div>  
    <div class="content-container">
      <div class="side-bar">
        <div class="description">
        <p>fourth ipsum dolor sit amet, consectetur adipiscing elit. Sed nec ipsum nec odio tincidunt ultricies. Aliquam sed arcu sit amet mi congue lacinia.</p>
        </div>
        <div class="tabs">
          <button class="tablinks active" onclick="openTab(event, 'grade')">grade</button>
          <button class="tablinks" onclick="openTab(event, 'club')">club</button>
          <button class="tablinks" onclick="openTab(event, 'sport')">sport</button>
          <button class="tablinks" onclick="openTab(event, 'hobby')">hobby</button>
        </div>
      </div>
      <div class="members">
        <div class="profile-container">
          <?php foreach($users as $user) { ?>
            <div class="profile">
            <img src="images/blue.png" alt="Profile Picture">
            <div class="profile-details">
                <h2><?php echo htmlspecialchars($user['first_name'])?><?php echo htmlspecialchars($user['last_name']); ?></h2>
                <p><?php echo htmlspecialchars($user['biography']); ?></p>
              <div class="tags">
              <?php $clubs = explode(',',  $user['clubs']); 
                foreach($clubs as $club) {
                  if($club != ''){?>
                <button class="tag"><?php echo "<a href=\"index.php\">" . $club  . "</a>"?></button>
                <?php }}?>
              <?php $sports = explode(',',  $user['sports']); 
                foreach($sports as $sport) {
                  if($sport != ''){?>
                <button class="tag"><?php echo "<a href=\"index.php\">" . $sport  . "</a>"?></button>
                <?php }}?>
                <?php $hobbies = explode(',',  $user['hobbies']); 
                foreach($hobbies as $hobbie) {
                  if($hobbie != ''){?>
                <button class="tag"><?php echo "<a href=\"index.php\">" . $hobbie  . "</a>"?></button>
                <?php }}?>
              </div>
            </div>
          </div>
          <?php } ?>

          <!-- <div class="profile">
            <img src="images/blue.png" alt="Profile Picture">
            <div class="profile-details">
                <h2>Name</h2>
                <p>Short description</p>
              <div class="tags">
                <button class="tag">Tag 1</button>
                <button class="tag">Tag 2</button>
                <button class="tag">Tag 3</button>
              </div>
            </div>
          </div>
          <div class="profile">
            <img src="images/blue.png" alt="Profile Picture">
            <div class="profile-details">
                <h2>Name</h2>
                <p>Short description</p>
              <div class="tags">
                <button class="tag">Tag 1</button>
                <button class="tag">Tag 2</button>
                <button class="tag">Tag 3</button>
              </div>
            </div>
          </div>
          <div class="profile">
            <img src="images/blue.png" alt="Profile Picture">
            <div class="profile-details">
                <h2>Name</h2>
                <p>Short description</p>
              <div class="tags">
                <button class="tag">Tag 1</button>
                <button class="tag">Tag 2</button>
                <button class="tag">Tag 3</button>
              </div>
            </div>
          </div>
          <div class="profile">
            <img src="images/blue.png" alt="Profile Picture">
            <div class="profile-details">
                <h2>Name</h2>
                <p>Short description</p>
              <div class="tags">
                <button class="tag">Tag 1</button>
                <button class="tag">Tag 2</button>
                <button class="tag">Tag 3</button>
              </div>
            </div>
          </div>
          <div class="profile">
            <img src="images/blue.png" alt="Profile Picture">
            <div class="profile-details">
                <h2>Name</h2>
                <p>Short description</p>
              <div class="tags">
                <button class="tag">Tag 1</button>
                <button class="tag">Tag 2</button>
                <button class="tag">Tag 3</button>
              </div>
            </div>
          </div>
          <div class="profile">
            <img src="images/blue.png" alt="Profile Picture">
            <div class="profile-details">
                <h2>Name</h2>
                <p>Short description</p>
              <div class="tags">
                <button class="tag">Tag 1</button>
                <button class="tag">Tag 2</button>
                <button class="tag">Tag 3</button>
              </div>
            </div>
          </div>
          <div class="profile">
            <img src="images/blue.png" alt="Profile Picture">
            <div class="profile-details">
                <h2>Name</h2>
                <p>Short description</p>
              <div class="tags">
                <button class="tag">Tag 1</button>
                <button class="tag">Tag 2</button>
                <button class="tag">Tag 3</button>
              </div>
            </div>
          </div>
          <div class="profile">
            <img src="images/blue.png" alt="Profile Picture">
            <div class="profile-details">
                <h2>Name</h2>
                <p>Short description</p>
              <div class="tags">
                <button class="tag">Tag 1</button>
                <button class="tag">Tag 2</button>
                <button class="tag">Tag 3</button>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
</body>
</html>