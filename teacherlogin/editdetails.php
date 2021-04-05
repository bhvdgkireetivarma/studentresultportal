<link rel="stylesheet" href="editdetails.css?version=51"/>
<?php  
$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$roll=$_SESSION['studentroll'];
$sql="SELECT * FROM student_details WHERE roll='$roll'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$name=$row['studentname'];

$bday=$row['birthdate'];
$gender=$row['gender'];
$email=$row['email'];
$class=$row['class'];
$phone=$row['phonenumber'];

$error="";
if(isset($_POST["sub"]))
{
    $nam=$_POST['nam'];
    $gen=$_POST['gen'];
    $bdy=$_POST['bday'];
    $cla=$_POST['class'];
    $eml=$_POST['email'];
    $phn=$_POST['phn'];
    if($nam!=""&&$gen!=""&&$bdy!=""&&$cla!=""&&$eml!=""&&$phn!="")
    {
        $sql="UPDATE student_details 
        SET studentname='$nam', gender='$gen',email='$eml',phonenumber='$phn',class='$cla',birthdate='$bdy' 
        WHERE roll=$roll";
        $sql1="UPDATE studentgrades 
        SET name='$nam' WHERE rollnumber='$roll'";
        $result1=$conn->query($sql1);
        $result=$conn->query($sql);
        if($result&&$result1)
        {
$error="succesful!";
        }
    }
}
?>

<html>
<head>

</head>



<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<div class="main">
<div class="head">
Edit Details
</div>
<div class="names">
<div>
    Name :<span><?php echo "$name"; ?></span>
</div>
<div>
Roll Number :<span><?php echo "$roll"; ?></span>
</div>
</div>
<div class="subject">
    <div>Name :<span> <?php echo "$name"; ?></span> <span><input type="varchar" name="nam"></input></span></div>
    <div> Gender:<span> <?php echo "$gender"; ?></span> <span><input type="varchar" name="gen"></input></span></div>
    <div>Birthdate :<span> <?php echo "$bday"; ?></span> <span><input type="date" name="bday"></input></span></div>
    <div>Class :<span> <?php echo "$class"; ?></span> <span><input type="number" name="class"></input></span></div>
    <div>Email :<span> <?php echo "$email"; ?></span> <span><input type="email" name="email"></input></span></div>
    <div>Phone No :<span> <?php echo "$phone"; ?></span> <span><input type="varchar" name="phn"></input></span></div>
    <div><button type="submit" name="sub">submit</button> </div>
</div>
<div class="error">
    <?php echo "$error";?>
</div>
</div>
</form>

</body>
</html>