<link rel="stylesheet" href="editresult.css?version=1"/>
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
$error="Updation Succesful!";
        }
    }
}
?>

<html>
<head>

</head>



<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<div class="head">
Update Student Marks
</div>
<div class="main">

<div class="names">
<div class="namee name">
    Name :<span><?php echo "$name"; ?></span>
</div>
<div class="namee roll">
Roll Number :<span><?php echo "$roll"; ?></span>
</div>
</div>
<table class="table">
<tr>
<th>Subject</th>
<th>Marks</th>
<th>Update</th>
</tr>
<tr>
<td>Telugu</td>
<td><?php echo "$telugu"; ?></td>
<td><input type="number" name="tel" value="<?php echo "$telugu"; ?>" min="0" max="100"></input></td>
</tr>
<tr>
<td>English</td>
<td><?php echo "$english"; ?></td>
<td><input type="number" name="eng" value="<?php echo "$english"; ?>" min="0" max="100"></input></td>
</tr>
<tr>
<td>Hindi</td>
<td><?php echo "$hindi"; ?></td>
<td><input type="number" name="hin" value="<?php echo "$hindi"; ?>" min="0" max="100"></input></td>
</tr>
<tr>
<td>Social</td>
<td><?php echo "$social"; ?></td>
<td><input type="number" name="soc" value="<?php echo "$social"; ?>" min="0" max="100"></input></td>
</tr>
<tr>
<td>Science</td>
<td><?php echo "$science"; ?></td>
<td><input type="number" name="sci" value="<?php echo "$science"; ?>" min="0" max="100"></input></td>
</tr>
<tr>
<td>Computer</td>
<td><?php echo "$cp"; ?></td>
<td><input type="number" name="cp" value="<?php echo "$cp"; ?>" ></input></td>
</tr>
</table>
<div class="buttonn"><button class="but" type ="submit" name="sub">Update</button></div>

</div>
<div class="error">
    <?php echo "$error";?>
</div>
</form>

</body>
</html>