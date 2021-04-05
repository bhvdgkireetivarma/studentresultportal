<link rel="stylesheet" href="result.css?version=1"/>
<?php 
session_start();
$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$roll=$_SESSION['studentroll'];
$sql="SELECT * FROM studentgrades WHERE rollnumber='$roll' ";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$name=$row['name'];
$rollnum=$row['rollnumber'];
$telugu=$row['Telugu'];
$english=$row['English'];
$hindi=$row['Hindi'];
$social=$row['Social'];
$science=$row['Science'];
$cp=$row['CP'];
$class=$row['class'];
$total=$telugu+$hindi+$english+$social+$science+$cp;
$percentage=round(($total/600)*100);
$verdict;
if($percentage>=45)
{
    $verdict="<div class='verdict pass'>
    Passed
    </div>";
}
else{
    $verdict="<div class='verdict fail'>
    Failed
    </div>";
}
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
 width:100%;
 text-align:center;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding:8px 8px;
}


</style>

<html>
<head>


</head>
<body>
<div class="headline">
Result
</div>
<!--
<div class="image">
        <img src="calicut_logo.png" height="90px"/>
        </div>
<div class="main">
    
    <div class="head">
    <div>
        Name: <span><?php echo "$name";?></span>
</div>
<div>
        Roll Number: <span><?php echo "$rollnum";?></span>
</div>
</div>
<div class="subject">
    <div>Telugu:<span><?php echo "$telugu" ;?> </span></div>
    <div>English:<span><?php echo "$english" ;?> </span></div>
    <div>Hindi:<span><?php echo "$hindi" ;?> </span></div>
    <div>Social:<span><?php echo "$social" ;?> </span></div>
    <div>Science:<span><?php echo "$science" ;?> </span></div>
    <div>Computer:<span><?php echo "$cp" ;?> </span></div>
    <div>
    <div>

</div>       
</div>
<div class="submit"> 
    <a href="logout.php"><button type="print">Log Out</button></a>
</div>
-->

<div class="bground">
<div class="nameslist">
<span class="names one">Student Name:</span><span class="namess one"><?php echo "$name";?></span>
</div>
<div class="nameslist">
<span class="names two">Student Rollid:</span><span class="namess two"><?php echo "$rollnum";?></span>
</div>
<div class="nameslist">
<span class="names two">Student Class:</span><span class="namess three"><?php echo "$class";?></span>
</div>

<table>
<tr>
    <th>Si No</th>
    <th>Subject</th>
    <th>Marks</th>
  </tr>
  <tr>
    <td>1</td>
    <td>English</td>
    <td><?php echo $english; ?></td>
  </tr>
  <tr>
    <td>2</td>
    <td>Telugu</td>
    <td><?php echo $telugu; ?></td>
  </tr>
  <tr>
    <td>3</td>
    <td>Hindi</td>
    <td><?php echo $hindi; ?></td>
  </tr>
  <tr>
    <td>4</td>
    <td>Science</td>
    <td><?php echo $science; ?></td>
  </tr>
 
  <tr>
    <td>5</td>
    <td>Social</td>
    <td><?php echo $social; ?></td>
  </tr>
  <tr>
    <td>6</td>
    <td>CP</td>
    <td><?php echo $cp; ?></td>
  </tr>
  <tr>
    <th colspan="2" >Total Marks</th>
 
    <th><?php echo $total; ?></th>
  </tr>
  <tr>
    <th colspan="2" >Percentage</th>
 
    <th><?php echo $percentage."%"; ?></th>
  </tr>
  <tr>
    <th colspan="2" >Verdict</th>
 
    <th><?php echo $verdict; ?></th>
  </tr>
 

</table>


</div>
</body>
</html>
