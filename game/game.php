<?php include_once 'Format/header.php'?>
<?php echo "<p>HELLO THERE: ". $_SESSION["usersName"] . "</p>";
?>

<body>
    
    <p><font size="4">Press ⎵ to start game</font></p>
    <p><font size="4">Press ↑ to jump</font></p>

    <div id="container">
        <div id="pikachu">
            <img src="assets/pikachu.png" alt="pikachu">
        </div>
        <div id="block">
            <img src="assets/block.png" alt="block">
        </div>
        <div id="road">
<?php include_once 'Format/header.php'?>
<?php echo "<p>HELLO THERE: ". $_SESSION["usersName"] . "</p>";
?>

<body>
    
    <p><font size="4">Press ⎵ to start game</font></p>
    <p><font size="4">Press ↑ to jump</font></p>

    <div id="container">
        <div id="pikachu">
            <img src="assets/pikachu.png" alt="pikachu">
        </div>
        <div id="block">
            <img src="assets/block.png" alt="block">
        </div>
        <div id="road">
            <img src="assets/road.png" alt="road">
        </div>
        <div id="cloud">
            <img src="assets/cloud.png" alt="cloud">
        </div>
        <div id="score">
            <p>Score<b>00</b></p>
        </div>
        <div id = "gameStart">
            <p>press SPACE to start </p>
            <p><font size="4">Press ↑ to jump</font></p>
        </div>
        <div id="gameOver">
            <p>Game Over </p>
           <p><font size="4">Press enter to play again!</font></p>
        </div>
    </div>
   ' <script language ="javascript">
let container = document.querySelector("#container");
let pikachu = document.querySelector("#pikachu");
let block = document.querySelector("#block");
let road = document.querySelector("#road");
let cloud = document.querySelector("#cloud");
let score = document.querySelector("#score");
let gameOver = document.querySelector("#gameOver");

//declaring variable for score
let interval = null;
let playerScore = 0;


//function for score
let scoreCounter = () => {
    playerScore++;
    score.innerHTML = `Score <b>${playerScore}</b>`;
}


//start Game
window.addEventListener("keydown", (start) => {
    //console.log(start);

    if (start.code == "Space") {
        gameOver.style.display = "none";
        block.classList.add("blockActive");
        road.firstElementChild.style.animation = "roadAnimate 1.5s linear infinite";
        cloud.firstElementChild.style.animation = "cloudAnimate 50s linear infinite";

        //score function
        let playerScore = 0;
        interval = setInterval(scoreCounter, 200);
    }
});


//jump Your Character
window.addEventListener("keydown", (e) => {
    //console.log(e);

    if (e.key == "ArrowUp")
        if (pikachu.classList != "pikachuActive") {
            pikachu.classList.add("pikachuActive");

            //remove class after 0.5 seconds
            setTimeout(() => {
                pikachu.classList.remove("pikachuActive");
            }, 500);
        }
});

//update score
window.addEventListener("keydown", (update) => {
    //console.log(update);

    if(update.key == "Enter"){
        //compare and update highest score
        window.location.href="compare.php?score="+playerScore;
        playerScore = 0;
    }
});
    
    
let result = setInterval(() => {
    let pikachuBottom = parseInt(getComputedStyle(pikachu).getPropertyValue("bottom"));
    //console.log("dinoBottom" + dinoBottom);

    let blockLeft = parseInt(getComputedStyle(block).getPropertyValue("left"));
    //console.log("BlockLeft" + blockLeft);

    if (pikachuBottom <= 80 && blockLeft >= 10 && blockLeft <= 80) {
        
        //console.log("Game Over");
        //stop animation
        gameOver.style.display = "block";
        block.classList.remove("blockActive");
        road.firstElementChild.style.animation = "none";
        cloud.firstElementChild.style.animation = "none";
        
    }
}, 10);
    </script>';


    

   

</body>
