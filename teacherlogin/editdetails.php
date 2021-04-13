<link rel="stylesheet" href="editdetails.css?version=1"/>
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
$error="Update succesful!";
        }
    }
}
?>

<html>
<head>

</head>



<body>
<div class="head">
Update Student Details
</div>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<div class="main">

<div class="names">
<div class="namess name">
    Name :<span><?php echo "$name"; ?></span>
</div>
<div class="namess roll">
Roll Number :<span><?php echo "$roll"; ?></span>
</div>
</div>
<table>
    
      <tr>
             <td><div>Student Name</div></th>
            <td><?php echo "$name"; ?></th>
            <td><input type="varchar" name="nam" value="<?php echo "$name"; ?>"></th>
      </tr>
      <tr>
             <td><div>Gender</div></th>
            <td><?php echo "$gender" ?></th>
            <td><input type="varchar" name="gen" value="<?php echo "$gender"; ?>"></th>
      </tr>
      <tr>
             <td><div>BirthDate</div></th>
            <td><?php echo "$bday" ?></th>
            <td><input type="date" name="bday" value="<?php echo "$bday"; ?>"></th>
      </tr>
      <tr>
             <td><div>Class</div></th>
            <td><?php echo "$class" ?></th>
            <td><input type="number" name="class" value="<?php echo "$class"; ?>"></th>
      </tr>
      <tr>
             <td><div>Email</div></th>
            <td><?php echo "$email" ?></th>
            <td><input type="varchar" name="email" value="<?php echo "$email"; ?>"></th>
      </tr>
      <tr>
      <td><div>Phone number</div></th>
            <td><?php echo "$phone" ?></th>
            <td><input type="varchar" name="phn" value="<?php echo "$phone"; ?>"></th>
      </tr>
</table>

<div class="butt"><button class="buttons" type="submit" name="sub">Update</button> </div>

</div>
<div class="error">
    <?php echo "$error";?>
</div>
</form>

</body>
</html>