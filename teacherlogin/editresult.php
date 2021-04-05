<link rel="stylesheet" href="editresult.css"/>
<?php  
$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$roll=$_SESSION['studentroll'];
$sql="SELECT * FROM studentgrades WHERE rollnumber='$roll'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$name=$row['name'];

$telugu=$row['Telugu'];
$english=$row['English'];
$hindi=$row['Hindi'];
$social=$row['Social'];
$science=$row['Science'];
$cp=$row['CP'];
$error="";
if(isset($_POST["sub"]))
{
    $tel=$_POST['tel'];
    $eng=$_POST['eng'];
    $hin=$_POST['hin'];
    $soc=$_POST['soc'];
    $sci=$_POST['sci'];
    $cp=$_POST['cp'];
    if($tel!=""&&$eng!=""&&$hin!=""&&$soc!=""&&$sci!=""&&$cp!="")
    {
        $sql="UPDATE studentgrades 
        SET Telugu='$tel', English='$eng',Hindi='$hin',Social='$soc',Science='$sci',CP='$cp' 
        WHERE rollnumber=$roll";
        $result=$conn->query($sql);
        if($result)
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
Edit Marks
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
    <div>Telugu :<span> <?php echo "$telugu"; ?></span> <span><input type="number" name="tel"></input></span></div>
    <div>English :<span> <?php echo "$english"; ?></span> <span><input type="number" name="eng"></input></span></div>
    <div>Hindi :<span> <?php echo "$hindi"; ?></span> <span><input type="number" name="hin"></input></span></div>
    <div>Social :<span> <?php echo "$social"; ?></span> <span><input type="number" name="soc"></input></span></div>
    <div>Science :<span> <?php echo "$science"; ?></span> <span><input type="number" name="sci"></input></span></div>
    <div>Computer :<span> <?php echo "$cp"; ?></span> <span><input type="number" name="cp"></input></span></div>
    <div><button type="submit" name="sub">submit</button> </div>
</div>
<div class="error">
    <?php echo "$error";?>
</div>
</div>
</form>

</body>
</html>