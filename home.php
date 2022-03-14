<?php
    session_start();
?>
<?php include_once 'header.php'?>

    <div class="empty"></div>
    <div class="main-banner" id="main-banner">
        <div class="imgban" id="imgban3">

        </div>
        <div class="imgban" id="imgban2">

        </div>
        <div class="imgban" id="imgban1">

        </div>
    </div>

    <script>
        var bannerstatus=1;
        var bannerTimer=4000;
        
        window.onload=function(){
            loop();
        }
        var startBannerLoop=setInterval(function(){
            loop();
        }, bannerTimer);
        function loop(){
            if(bannerstatus==1){

                document.getElementById("imgban2").style.opacity="0";
                setTimeout(function(){
                    document.getElementById("imgban1").style.right="0px";
                    document.getElementById("imgban1").style.zIndex="1000";
                    document.getElementById("imgban2").style.right="-1200px";
                    document.getElementById("imgban2").style.zIndex="1500";
                    document.getElementById("imgban3").style.right="1200px";
                    document.getElementById("imgban3").style.zIndex="500";

                }, 500);
                setTimeout(function(){
                document.getElementById("imgban2").style.opacity="1";
                }, 1000);
                bannerstatus=2;
            }
            else if(bannerstatus==2){

            document.getElementById("imgban3").style.opacity="0";
            setTimeout(function(){
                document.getElementById("imgban2").style.right="0px";
                document.getElementById("imgban2").style.zIndex="1000";
                document.getElementById("imgban3").style.right="-1200px";
                document.getElementById("imgban3").style.zIndex="1500";
                document.getElementById("imgban1").style.right="1200px";
                document.getElementById("imgban1").style.zIndex="500";
            }, 500);
            setTimeout(function(){
            document.getElementById("imgban3").style.opacity="1";
            }, 1000);
            bannerstatus=3;
            }
            else if(bannerstatus==3){

            document.getElementById("imgban1").style.opacity="0";
            setTimeout(function(){
                document.getElementById("imgban3").style.right="0px";
                document.getElementById("imgban3").style.zIndex="1000";
                document.getElementById("imgban1").style.right="-1200px";
                document.getElementById("imgban1").style.zIndex="1500";
                document.getElementById("imgban2").style.right="1200px";
                document.getElementById("imgban2").style.zIndex="500";
            }, 500);
            setTimeout(function(){
            document.getElementById("imgban1").style.opacity="1";
            }, 1000);
            bannerstatus=1;
            }
        }

    </script>
    <div class="intro">
        <?php
        if(isset($_SESSION["userid"])){
            echo "<h3>Hello there ". $_SESSION["useruid"] . "</h3>";
        }
                    
        ?>
        <h3>About Me</h3>
        <p>In this day and age, due to the COVID-19 situation in Hong Kong, university students are hard to meet each other face to face 
	in the campus. As students seldom have interaction during the online lessons, they hard to make new friends during the online 
	University life. Besides, many entertainment facilities such as cinema and theme park were forced to closed under the pandemic 
	situation, which severely limited the leisure activities that students can enjoy.  Therefore, as a group of computer software 
	developer, we would like to introduce a new entertaining-base web application to university students in CUHK.</p>
    </div>
	

<?php include_once 'footer.php'?>
