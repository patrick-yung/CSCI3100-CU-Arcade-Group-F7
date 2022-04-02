let container = document.querySelector("#container");
let pikachu = document.querySelector("#pikachu");
let block = document.querySelector("#block");
let road = document.querySelector("#road");
let cloud = document.querySelector("#cloud");
let score = document.querySelector("#score");
let highest_score = document.querySelector("#highest_score")
let gameOver = document.querySelector("#gameOver");

//declaring variable for score
let interval = null;
var playerScore = 0;
var playerHighestScore = 0;


//function for score
let scoreCounter = () => {
    //playerScore++ for every 200 ms
    playerScore++;
    score.innerHTML = `Score <b>${playerScore}</b>`;
}

highest_score.innerHTML = `Highest Score <b>${playerHighestScore}</b>`;


//start Game
window.addEventListener("keydown", (start) => {
    //console.log(start);

    //start game by pressing space button
    if (start.code == "Space") {

        //disable game over tag
        gameOver.style.display = "none";

        //enable the block, road and cloud animation
        block.classList.add("blockActive");
        road.firstElementChild.style.animation = "roadAnimate 1.5s linear infinite";
        cloud.firstElementChild.style.animation = "cloudAnimate 50s linear infinite";

        //score count use in scoreCounter()
        playerScore = 0;
        interval = setInterval(scoreCounter, 200);
    }
});


//jump Your Character
window.addEventListener("keydown", (e) => {
    //console.log(e);

    //pressing arrow up to make pikachu jump
    if (e.key == "ArrowUp")
        if (pikachu.classList != "pikachuActive") {
            pikachu.classList.add("pikachuActive");

            //remove class after 0.5 seconds
            setTimeout(() => {
                pikachu.classList.remove("pikachuActive");
            }, 500);
        }
});

//'Game Over' if 'Character' hit The 'Block' 
let result = setInterval(() => {
    let pikachuBottom = parseInt(getComputedStyle(pikachu).getPropertyValue("bottom"));
    //console.log("pikachuBottom" + pikachuBottom);

    let blockLeft = parseInt(getComputedStyle(block).getPropertyValue("left"));
    //console.log("BlockLeft" + blockLeft);


    if (pikachuBottom <= 80 && blockLeft >= 10 && blockLeft <= 80) {
        //console.log("Game Over");

        //check and update highest score
        if(playerScore > playerHighestScore){
            playerHighestScore = playerScore;
        }

        //display gameover tag in html
        gameOver.style.display = "block";

        //disable block, road and cloud animation
        block.classList.remove("blockActive");
        road.firstElementChild.style.animation = "none";
        cloud.firstElementChild.style.animation = "none";

        //return player score to php
        //console.log(playerScore)
        
        //stop counting for score
        clearInterval(interval);
        
    }
});

