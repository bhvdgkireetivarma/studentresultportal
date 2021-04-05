<link rel="stylesheet" href="addstudent.css?version=51"/>
<?php 

$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$finalmsg="";
if(isset($_POST["register"]))
{
    $name=$_POST["name"];
    $class=$_POST["class"];
$gender=$_POST["gender"];
$rollnum=$_POST["rollnumber"];
$bday=$_POST["bday"];
$phone=$_POST["phnum"];
$email=$_POST["email"];
$pass=$_POST["password"];
$telugu=$_POST["telugu"];
$english=$_POST["english"];
$hindi=$_POST["hindi"];
$social=$_POST["social"];
$science=$_POST["science"];
$cp=$_POST["cp"];
if($name!=""&&$gender!=""&&$rollnum!=""&&$bday!=""&&$phone!=""&&$email!=""&&$pass!=""&&$telugu!=""&&$english!=""&&$hindi!=""&&$social!=""&&$science!=""&&$cp!="")
{
    $sql="INSERT INTO student_details VALUES('$rollnum','$name','$bday','$gender','$email','$class','$phone')";
    $result=$conn->query($sql);
    $sql2="INSERT into student_login VALUES('$rollnum','$pass')";
    $result1=$conn->query($sql2);
    $sql3="INSERT INTO studentgrades VALUES('$rollnum','$name','$telugu','$english','$hindi','$social','$science','$cp','$class')";
    $result2=$conn->query($sql3);
  $sql4="INSERT INTO studentcheck VALUES('$rollnum','$name','$class','0')";
  $result3=$conn->query($sql4);
    if($result&&$result1&&$result2)
    {
  $finalmsg="successful!";
    }
    else{
        $finalmsg="unsuccess!";
    }
}


}


?>




<head>

</head>
<body>
<div class="main">
<div class="maine sub">
<div class="reg">Add Student</div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="total">
    <div class="first">
<div>
Student Roll: <input type="number" name="rollnumber"/>
</div>
<div>
Name: <input type="text" name="name"/>
</div>
<div>
Gender: <input type="text" name="gender"/>
</div>
<div>
Class: <input type="number" name="class"/>
</div>
<div>
Password: <input type="password" name="password"/>
</div>
<div>
Email Id: <input type="email" name="email"/>
</div>
<div>
Birthdate: <input type="date" name="bday"/>
</div>
<div>
    Phone Number: <input type="varchar" name="phnum"/>
</div>
</div>
<div class="second">
    <div>Telugu: <input type="number" name="telugu"/></div>
    <div>English: <input type="number" name="english"/></div>
    <div>Hindi: <input type="number" name="hindi"/></div>
    <div>Social: <input type="number" name="social"/></div>
    <div>Science: <input type="number" name="science"/></div>
    <div>Cp: <input type="number" name="cp"/></div>
    <div class="regi">
<button type="submit" name="register">Register</button>
</div>
<div class="errorr">
 <span><?php echo "$finalmsg";?></span>
</div>
   
</div>
</div>



</form>
</div>

</div>

</body>