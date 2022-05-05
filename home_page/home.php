/*
Author: Henry Wong
Last Update:10/04/2022
Function: display home page
*/
?>


<?php include_once 'Format/header.php'?>
<?php
        if(isset($_SESSION["userid"])){
            echo "<h3>Hello there ". $_SESSION["useruid"] . "</h3>";
        }         
?>


<head>
    <meta charset="UTF-8">
    <title>CU ARCADE</title>
    <link rel="stylesheet" href="Format/homepagestyle.css">
    <link rel="stylesheet" href = "../css/style2.css">

</head>

<body>
    <div>
    <div class="home-container">
      <img
        src="Assets/arcade.png"
        alt="image"
        class="arcade"
      />
      <img
        src="Assets/CU_Arcade.png"
        alt="image"
        class="icon01"
      />
      <span class="home-text">About CU Arcade</span>

      <span class="home-text1">
        <span class="home-text2">
            In this day and age, due to the COVID-19 situation in Hong Kong,
            university students are hard to meet each other face to face
          </span>
          <span class="home-text3">
            in the campus. As students seldom have interaction during the online
            lessons, they hard to make new friends during the online
          </span>
          <span class="home-text4">
            University life. Besides, many entertainment facilities such as cinema
            and theme park were forced to closed under the pandemic
          </span>
          <span class="home-text5">
            situation, which severely limited the leisure activities that students
            can enjoy. Therefore, as a group of computer software
          </span>
          <span class="home-text6">
            developer, we would like to introduce a new entertaining-base web
            application to university students in CUHK.
          </span>
      </span>
        

      <span class = "login">
        <a href="../Loginandregister/Register.php" target="_blank" rel="noreferrer noopener" class="home-link button">
            <img div id = "login" alt = "login" src = "Assets/login.png">
        </a>
      </span>

    </div>
  </div>
  

</body>


<?php include_once 'Format/footer.php'?>
