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
  <link rel="stylesheet" type="text/css" href="css/fonts.css">
  
  <?php
    include_once "head_include.php";
  ?>

</head>
    
<body>

<!--
<script> 
  $("#header").load("/header.html"); 
  $("#footer").load("footer.html"); 
</script>
 -->   
  <div class="pagecontainer">
      
    <?php
    include_once "header.php";
    ?>
      
    <div class="splash-container">
	    <div class="hero-container">
		    <h1 class="hero-text hero-text-1">Learning. Thinking.</h1>
		    <h1 class="hero-text hero-text-2">Designing. Creating.</h1>
		    <h1 class="hero-text hero-text-3">Innovating.</h1>
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
            <div class="sidebar-text"><a href="https://www.linkedin.com/pub/ian-abshire/4b/5ab/76">LinkedIn</a></div>
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
          <h1 class="welcome-heading">Welcome</h1>
          <div class="main-content-text">
          	<br>
             <br>
              <br>
            My name is Ian Abshire. I am a Software Engineer. I graduated from Northern Arizona University with a degree in Computer Engineering. Through various internships and employment I have gained experience in application development and quality assurance testing. Web development is a mostly self-taught hobby of mine.
              <br>
              <br>
              The purpose of this website is to demonstrate some of my experience using web technologies. This site was designed and built from scratch, by me, using a combination of HTML, CSS, PHP, MySQL, and JavaScript. Please feel free to explore the site. A test user account has been set up in order to provide access to member and administrator functions (basic messaging system, update info, admin options, etc.) without the need to register, although, anyone is welcome to create an account.
              <br>
              <br>
              For more detailed information about my qualifications, please check out my <a href="resume.php">resume</a>.
              <br>
              <br>
              - Ian
            </div>
        </div>
      </div>
    </div>
    
    <?php include_once "footer.php"; ?>
      
  </div>


    
</body>
</html>