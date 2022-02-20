<?php
    session_start();
?>
<?php include_once 'header.php'?>

<div class="empty"></div>
    <div class="picture"></div>


    <div class="intro">
        <?php
        if(isset($_SESSION["userid"])){
            echo "<h3>Hello there ". $_SESSION["useruid"] . "</h3>";
        }
                    
        ?>
        <h3>About Me</h3>
        <p>Anime (Japanese: アニメ, IPA: [aɲime] (About this soundlisten)) is hand-drawn and computer animation originating from Japan. In Japan and in Japanese, anime (a term derived from the English word animation) describes all animated works, regardless of style or origin. However, outside of Japan and in English, anime is colloquial for Japanese animation and refers specifically to animation produced in Japan.[1] Animation produced outside of Japan with similar style to Japanese animation is referred to as anime-influenced animation.

            The earliest commercial Japanese animations date to 1917. A characteristic art style emerged in the 1960s with the works of cartoonist Osamu Tezuka and spread in following decades, developing a large domestic audience. Anime is distributed theatrically, through television broadcasts, directly to home media, and over the Internet. In addition to original works, anime are often adaptations of Japanese comics (manga), light novels, or video games. It is classified into numerous genres targeting various broad and niche audiences.
            
            Anime is a diverse medium with distinctive production methods that have adapted in response to emergent technologies. It combines graphic art, characterization, cinematography, and other forms of imaginative and individualistic techniques.[2] Compared to Western animation, anime production generally focuses less on movement, and more on the detail of settings and use of "camera effects", such as panning, zooming, and angle shots.[2] Diverse art styles are used, and character proportions and features can be quite varied, with a common characteristic feature being large and emotive eyes.[3]
            
            The anime industry consists of over 430 production companies, including major studios like Studio Ghibli, Sunrise, and Toei Animation. Since the 1980s, the medium has also seen international success with the rise of foreign dubbed and subtitled programming. As of 2016, Japanese anime accounted for 60% of the world's animated television shows.[4]
            
            </p>
    </div>
	

<?php include_once 'footer.php'?>