<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
?>
<!DOCTYPE html>
<?php
include_once dirname(__FILE__) ."/includes/db_connect.php";
include_once dirname(__FILE__) ."/includes/functions.php";
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ian Abshire</title>
  <link rel="stylesheet" type="text/css" href="css/foundation.css">
  <link rel="stylesheet" type="text/css" href="css/ianabshire.css">
  <link rel="stylesheet" type="text/css" href="css/timeline.css">
  
  <?php
    include_once "head_include.php";
  ?>
  
  <script async src="js/modernizr.min.js"></script> <!-- Modernizr -->

</head>
    
<body>

  <div class="pagecontainer">
      
    <?php
    include_once "header.php";
    ?>
      
    <div class="splash-container">
	    <div class="hero-container">
	    	<h1 class="hero-text">This is an interesting quote, which will eventually be populated with a real quote.</h1>
	    	<h2 class="hero-text quote-author">- Ian Abshire</h2>
	    </div>
	    <div class="hero-container">
		    <!--<h1 class="hero-text hero-text-1">Improving the well being of all... </h1>
		    <h1 class="hero-text hero-text-2">through the power of innovation.</h1>-->
	    </div>
    </div>
    
    <div class="content">
        <div class="container">
      <!--
        <div class="leftsidebar">
          <div class="sidebar-item">
            <div class="sidebar-text"><a href=#>LinkedIn</a></div>
          </div>
          <div class="sidebar-item">
            <div class="sidebar-text">Sidebar Item</div>
          </div>
          <div class="sidebar-item">
            <div class="sidebar-text">Sidebar Item</div>
          </div>
          <div class="sidebar-item">
            <div class="sidebar-text">Sidebar Item</div>
          </div>
        </div>
        -->
            <div class="maincontent">
                <h1 class="section-heading">A Brief Introduction</h1>
                <div class="main-content-text">
					My name is Ian Abshire. I am a Software Engineer.
            		<br>
            		<br>
					I graduated from Northern Arizona University with a degree in Computer Engineering. Through employment, internships, and personal projects I have gained experience in many areas of software development. I have a passion for learning and a fierce dedication to making the world a better place for all.
                    <br>
                    <br>
					For more detailed information about my qualifications, please check out my <a href="resume.php" id="resume-link">resume</a>.
                </div>
            </div>
        </div>
    </div>
        
    <div class="content section-blue">
        <div class="container section-timeline">
	    	<h1 id="timeline-heading" class="section-heading">What I've Been Up To</h1>
		    <div id="cd-timeline" class="cd-container">
				<div class="cd-timeline-block">
					<div class="cd-timeline-img green">
						<!--<img src="img/cd-icon-picture.svg" alt="Picture">-->
					</div> <!-- cd-timeline-img -->
		
					<div class="cd-timeline-content">
						<h2>Started Computer Engineering Degree at NAU</h2>
						<p>I began studying Computer Engineering in 2010. My lifelong interest in technology led me to pursue a degree that allowed me to learn about both hardware and software. It was through my studies that I discovered software was not just an interest, but a passion.</p>
						<!--<a href="#0" class="cd-read-more">Read more</a>-->
						<span class="cd-date">Aug 2010</span>
					</div> <!-- cd-timeline-content -->
				</div> <!-- cd-timeline-block -->
		
				<div class="cd-timeline-block">
					<div class="cd-timeline-img red">
						<!--<img src="img/cd-icon-movie.svg" alt="Movie">-->
					</div> <!-- cd-timeline-img -->
		
					<div class="cd-timeline-content">
						<h2>Interned at R0R3 Engineered Solutions</h2>
						<p>At R0R3 I worked closely with noted inventor Jack McCauley, co-founder of Oculus VR. Here I gained hands on experience with product development cycles for consumer electronic devices.</p>
						<!--<a href="#0" class="cd-read-more">Read more</a>-->
						<span class="cd-date">Aug 2012</span>
					</div> <!-- cd-timeline-content -->
				</div> <!-- cd-timeline-block -->
		
				<div class="cd-timeline-block">
					<div class="cd-timeline-img blue">
						<!--<img src="img/cd-icon-picture.svg" alt="Picture">-->
					</div> <!-- cd-timeline-img -->
		
					<div class="cd-timeline-content">
						<h2>Interned at Kaiser Permanente IT</h2>
						<p>My internship at Kaiser exposed me to how large scale projects are managed at a high level. This experience gave me perspective, as an engineer, on how product decisions are made.</p>
						<!--<a href="#0" class="cd-read-more">Read more</a>-->
						<span class="cd-date">Aug 2013</span>
					</div> <!-- cd-timeline-content -->
				</div> <!-- cd-timeline-block -->
		
				<div class="cd-timeline-block">
					<div class="cd-timeline-img yellow">
						<!--<img src="img/cd-icon-location.svg" alt="Location">-->
					</div> <!-- cd-timeline-img -->
		
					<div class="cd-timeline-content">
						<h2>Interned at Carl Zeiss X-ray Microscopy</h2>
						<p>Zeiss was the most software oriented internship I completed. Over the course of the 3 month internship I completed a software application from start to finish. The entire application (GUI, business logic, algorithms, etc.) was written in Python. The application is currently used, in its original form, to test the x-ray source during the manufacturing process.</p>
						<!--<a href="#0" class="cd-read-more">Read more</a>-->
						<span class="cd-date">Aug 2014</span>
					</div> <!-- cd-timeline-content -->
				</div> <!-- cd-timeline-block -->
		
				<div class="cd-timeline-block">
					<div class="cd-timeline-img green">
						<!--<img src="img/cd-icon-location.svg" alt="Location">-->
					</div> <!-- cd-timeline-img -->
		
					<div class="cd-timeline-content">
						<h2>Graduated from NAU</h2>
						<p>I graduated prepared and ready to start contributing to the technological and scientific advancement of the world!</p>
						<!--<a href="#0" class="cd-read-more">Read more</a>-->
						<span class="cd-date">Dec 2014</span>
					</div> <!-- cd-timeline-content -->
				</div> <!-- cd-timeline-block -->
		
				<div class="cd-timeline-block">
					<div class="cd-timeline-img red">
						<!--<img src="img/cd-icon-movie.svg" alt="Movie">-->
					</div> <!-- cd-timeline-img -->
		
					<div class="cd-timeline-content">
						<h2>Started Full-Time Position at Carl Zeiss X-ray Microscopy</h2>
						<p>After a successful internship, I decided to accept a full-time position at Zeiss knowing I would have the opportunity to learn how to create cutting-edge technology from some of the brightest minds in the industry. Zeiss is where I am currently employed.</p>
						<span class="cd-date">Feb 2015</span>
					</div> <!-- cd-timeline-content -->
				</div> <!-- cd-timeline-block -->
		    </div> 
        </div>       
    </div>
    
    
    <div class="content">
	    <div class="container">
	    	<h1 class="section-heading">Purpose Of This Site</h1>
	    	<div class="maincontent section-sitepurpose">
	    		<div class="main-content-text">
					The purpose of this website is to demonstrate some of my experience using web technologies and serve as a place for me to experiment with new ideas. This site was designed and built from scratch using a combination of HTML, CSS, PHP, MySQL, and JavaScript/jQuery. Please feel free to explore the site. A test user account has been set up in order to provide access to member and administrator functions (basic messaging system, update info, admin options, etc.) without the need to register, although, anyone is welcome to create an account.
	    		</div>
	    	</div>
	    </div>
        
    </div>
    
    
    <?php include_once "footer.php"; ?>
      
  </div>

<script async src="js/main.js"></script> <!-- Resource jQuery -->
    
</body>
</html>