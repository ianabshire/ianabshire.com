<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
?>
<!DOCTYPE html>
<?php
include_once dirname(__FILE__) ."/includes/db_connect.php";
include_once dirname(__FILE__) ."/includes/functions.php";
if (isset($_GET['logout']) && $_GET['logout'] == true)
	doLogout($conn);
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ian Abshire - Resume</title>
  <link rel="stylesheet" type="text/css" href="css/foundation.css">
  <link rel="stylesheet" type="text/css" href="css/ianabshire.css">
  <link rel="stylesheet" type="text/css" href="css/resume.css">
  
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
      
    <!--<div class="resume-splash"></div>-->
    <div class="resume-content">
      <div class="resume-ribbon"></div>
      <div class="container">
        <div class="resume-maincontent">
            
          <div class="resume-section">Education</div>
            <a class="job-title education" href="http://www.nau.edu">Northern Arizona University</a>
            <div class="company-name education">
                Bachelor of Science in Engineering<br>
                Major: Electrical Engineering w/ Computer Emphasis<br>
                Cumulative GPA: 3.21; Major GPA: 3.52<br>
                Dean&#39;s List - Fall 2012, Fall 2013, Spring 2014, Fall 2015<br>
            </div>
            
          <div class="resume-section">Work Experience</div>
            
            <div class="job-title">Software Engineer</div><br>
            <a class="company-name" href="http://www.zeiss.com/microscopy/en_us/products/x-ray-microscopy.html">Carl Zeiss X-ray Microscopy</a>
            <div class="company-details">
            Pleasanton, CA - February, 2015 - Present
            </div>
            <div class="resume-text">
              <ul id="resume-list">
              </ul>
            </div>
            
            <div class="job-title">Software Engineering Intern</div><br>
            <a class="company-name" href="http://www.zeiss.com/microscopy/en_us/products/x-ray-microscopy.html">Carl Zeiss X-ray Microscopy</a>
            <div class="company-details">
            Pleasanton, CA - May-August, 2014
            </div>
            <div class="resume-text">
              <ul id="resume-list">
                <li>Independently develop a software application for testing X-Ray source specifications during the manufacturing process</li>
                <li>Create software to access images from X-Ray data sets through company API</li>
                <li>Write software utilizing various image analysis techniques to manipulate and analyze projection images</li>
                <li>Create software to calculate precise values from images, including: Pixel Size, X-Ray Source Spot Size, X-Ray Source Spot Shift</li>
                <li>Apply numerous mathematical concepts to complex analysis problems</li>
                <li>Utilize Object Oriented Programming techniques to effectively organize application</li>
                <li>Design and build GUI for software application</li>
                <li>Present completed project to engineering, software and management teams</li>
                <li>Contribute as a member of an engineering team</li>
              </ul>
            </div>
            
            <div class="job-title">Information Technology Intern</div><br>
            <a class="company-name" href="https://healthy.kaiserpermanente.org/html/kaiser/index.shtml">Kaiser Permanente</a>
            <div class="company-details">
            Pleasanton, CA - June-August, 2013
            </div>
            <div class="resume-text">
              <ul id="resume-list">
                <li>Develop performance metrics</li>
                <li>Generate reports for measuring performance</li>
                <li>Contribute as a member of the PMO team for a large, company wide program</li>
                <li>Build and maintain both a PMO team and program collaboration site</li>
                <li>Assist in the creation of documents and presentations used by high level executives</li>
              </ul>
            </div>
            
            <div class="job-title">Quality Assurance/Product Development</div><br>
            <div class="company-name"><a id="company-name" href="http://www.r0r3.com/">R0R3 Engineered Solutions</a> (<a id="company-name" href="http://en.wikipedia.org/wiki/Jack_McCauley">Jack McCauley</a>, co-founder of Oculus VR)</div>
            <div class="company-details">
            Livermore, CA - May-August, 2012
            </div>
            <div class="resume-text">
              <ul id="resume-list">
                <li>Perform quality assurance testing on electronic devices throughout the manufacturing process</li>
                <li>Assist in developing new products for the consumer electronics market</li>
                <li>Create and conduct experiments on products in development</li>
                <li>Create reports documenting activity throughout development and testing stages</li>
                <li>Provide research on competing products</li>
                <li>Meet with customers to present testing data throughout the development process</li>
              </ul>
            </div>
            
            <div class="job-title">IT Manager/Online Advertising/Social Media</div><br>
            <a class="company-name" href="http://www.mypizzapirate.com/">Pizza Pirate</a>
            <div class="company-details">
            Benicia, CA - 2009-2013
            </div>
            <div class="resume-text">
              <ul id="resume-list">
                <li>Build and manage desktop and mobile website</li>
                <li>Setup and manage restaurant wide wireless network</li>
                <li>Install and manage camera system with remote access</li>
                <li>Build, maintain and troubleshoot computers for Point Of Sales system</li>
                <li>Find new ways to advertise/create ads</li>
                <li>Manage business profile on several social media sites and mobile applications</li>
              </ul>
            </div>
            
            <div class="job-title">Technical Support/Lead Generation</div><br>
            <a class="company-name" href="http://www.sales-masters.com/">Sales Masters</a>
            <div class="company-details">
            San Ramon, CA - May-August, 2009 & May-August, 2010
            </div>
            <div class="resume-text">
              <ul id="resume-list">
                <li>Provide technical support to employees</li>
                <li>Maintain computers</li>
                <li>Create tutorials for programs such as: Word, Outlook, etc.</li>
                <li>Manage online lead generation process</li>
                <li>Find new ways to generate leads online</li>
              </ul>
            </div>
            
          <div class="resume-section">Skills / Languages</div>
            
            <ul class="skills-list" id="skills-item">
                <li id="skills-item">Python</li>
                <li id="skills-item">Matlab</li>
                <li id="skills-item">C/C++</li>
                <li id="skills-item">Java</li>
                <li id="skills-item">VHDL</li>
                <li id="skills-item">HTML</li>
                <li id="skills-item">CSS</li>
                <li id="skills-item">JavaScript</li>
                <li id="skills-item">Microsoft Office</li>
                <li id="skills-item">Windows</li>
                <li id="skills-item">Mac OS X</li>
                <li id="skills-item">Public Speaking</li>
              </ul>
            
            <div class="resume-section">Other Activities / Organizations</div>
              
              <div class="resume-text">
              <ul id="resume-list">
                <li>Active member of IEEE Student Organization - January, 2012-Present</li>
                <li>Robotics Team, won second place in FIRST Robotics West Coast Regionals - 2008-2009</li>
              </ul>
            </div>
            
          </div>
        </div>
      </div>
      
	  <?php include_once "footer.php"; ?>
      
    </div>