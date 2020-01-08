<?php
session_start();
require 'connect.php';
require 'header.html';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body>


    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="images/home-slider-1.jpg" style="width:100%">
            <div class="text">
                <a href="money-donation.php">DONATE NOW</a>
                <p>YOUR DONATION WILL SAVE LIVES</p>
            </div>
        </div>

        <div class="mySlides fade">
            <img src="images/home-slider-2.jpg" style="width:100%">
            <div class="text">
                <a href="money-donation.php">DONATE NOW</a>
                <p>YOUR DONATION WILL SAVE LIVES</p>
            </div>
        </div>

        <div class="mySlides fade">
            <img src="images/home-slider-3.jpg" style="width:100%">
            <div class="text">
                <a href="money-donation.php">DONATE NOW</a>
                <p>YOUR DONATION WILL SAVE LIVES</p>
            </div>
        </div>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 5000); // Change image every 5 seconds
        }

    </script>

    <div class="mission-box">
        <img src="images/icons/our-mission-icon.png" alt="">
        <h3 class="col-title">our mission</h3>
        <div class="col-details">
            <p>Charity Donations is a leading national relief and development charity which works to alleviate human suffering around the country. Established in 2019 we are an independent NGO and provide aid and assistance to the most needy in kenya.</p>
        </div>
    </div>

    <div class="make-donations">
        <img src="images/icons/make-donation-icon.png" alt="">
        <h3 class="col-title">Make donations</h3>
        <div class="col-details">
            <p>Donate for the poor childern, as giving is a virtual.Donate don't let them down because they need your help.Lorem ipsum dolor sit amet consect adipisscin elit proin vel lectus ut eta esami vera dolor sit amet consect Lorem ipsum dolor sit amet</p>
        </div>
    </div>

    <div class="help-support">
        <img src="images/icons/help-icon.png" alt="">
        <h3 class="col-title">Help & support</h3>
        <div class="col-details">
            <p>you can also support the charity to smoothen the load of its operations and for sure you will be much appreciated. Lorem ipsum dolor sit amet consect adipisscin elit proin vel lectus ut eta esami vera dolor sit amet consect.Lorem ipsum dolor sit amet</p>
        </div>
    </div>
    <div class="programs">
        <img src="images/icons/programs-icon.png" alt="">
        <h3 class="col-title">our programs</h3>
        <div class="col-details">
            <p>We make our ways to make sure that donation made gets to where it is most needed and at the right time.Lorem ipsum dolor sit amet consect adipisscin elit proin vel lectus ut eta esami vera dolor sit amet consect.Lorem ipsum dolor sit amet consect</p>
        </div>
    </div>

    <div class="section-home our-sponsors animate-onscroll fadeIn">

        <div class="container">

            <h5 class="title-style-1">Our sponsors <span class="title-under"></span></h5>

            <ul class="list-sponsors">

                <li> <img src="images/sponsors/bus.png" alt=""></li>
                <li> <img src="images/sponsors/wikimedia.png" alt=""></li>
                <li> <img src="images/sponsors/one-world.png" alt=""></li>
                <li> <img src="images/sponsors/wikiversity.png" alt=""></li>
                <li> <img src="images/sponsors/united-nations.png" alt=""></li>

            </ul>

        </div>

    </div> <!-- /.our-sponsors -->
    <div class="footer">

        <ul>
            <a href="index.php">Home</a>
            <a href="about-us.html">About Us</a>
            <a href="money-donation.php">Donate now</a>
            <a href="support-us.php">Support us</a>
        </ul>
    </div>
</body>

</html>
