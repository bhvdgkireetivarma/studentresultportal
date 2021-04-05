<link rel="stylesheet" href="studentdetails.css?version=51"/>
<?php
session_start();
$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name="";
$studentid=$_SESSION['studentroll'];

$sql="SELECT * FROM student_details WHERE roll='$studentid' ";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$name=$row['studentname'];
$rollnumber=$row['roll'];
$gender=$row['gender'];
$bday=$row['birthdate'];
$email=$row['email'];
$class=$row['class'];
$phone=$row['phonenumber'];

?>
<html>
<head>
    
</head>
<body>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

<div class="main">
 
    <div class="head">
<div class="clglogo">
    <img src="calicut_logo.png" height="75px"/>
</div>
<div class="national">
    National Institute of Technology Calicut
</div>
</div>
<div class="details">
<div class="det stuname">
    Student Name:  <span><?php echo " $name" ;?></span>
</div>
<div  class="det gender">
    Gender: <span><?php echo " $gender" ;?></span>
</div>
<div  class="det rolll">
    Roll Number: <span><?php echo " $rollnumber" ;?></span>
</div>
<div  class="det classs">
    Class: <span><?php echo " $class" ;?></span>
</div>
<div  class="det email">
    Email Id: <span><?php echo " $email" ;?></span>
</div>
<div  class="det bdaay">
 Birth Date: <span><?php echo " $bday" ;?></span>
</div>
<div  class="det bdaay">
 Phone Number: <span><?php echo " $phone" ;?></span>
</div>


</div>
</form>

</body>




    </html>