<link rel="stylesheet" href="addstudent.css?version=81"/>
<?php 
session_start();
if(!isset($_SESSION['teacherid'])){
  header('location:http://localhost/studentresultportal/studentlogin/logout.php');
}
$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$finalmsg="";
if(isset($_POST["register"]))
{
$teacherid=$_SESSION['teacherid'];
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
    $sql="INSERT INTO student_details VALUES('$rollnum','$name','$bday','$gender','$email','$class','$phone','$teacherid','$pass')";
    $result=$conn->query($sql);
    $sql3="INSERT INTO studentgrades VALUES('$rollnum','$name','$telugu','$english','$hindi','$social','$science','$cp','$class')";
    $result2=$conn->query($sql3);
  $sql4="INSERT INTO studentcheck VALUES('$rollnum','$name','$class',0)";
  $result3=$conn->query($sql4);

  $sql5="INSERT INTO studentevaluatuion VALUES('$rollnum',0,0,0,0,0,0)";

  $result4=$conn->query($sql5);

  $sql6="INSERT INTO teacherstudent VALUES('$teacherid','$rollnum')";
  $result5=$conn->query($sql6);
    if($result&&$result2&&$result3&&$result4&&$result5)
    {
  $finalmsg="successful!";
    }
    else{
        $finalmsg="unsuccess!".$result."sfs".$result2."sdss".$result3."fs";
    }
}


}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="reg">Add Student</div>

<div class="container1 my-5">
  
  <button type="button" class="button1" data-toggle="collapse" >Add Login Details</button>
  <div id="demo" class="mx-3 my-3">
      <div>
     
  <div class="form-group">
    <label for="exampleInputEmail1">Student Roll Number</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Roll Number" name="rollnumber">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" value="FakePSW" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
<div>
<input type="checkbox" class="px-2" onclick="myfunction()">Show Password</input>
</div>
     </div>
  </div>
</div>

<div class="container2 my-5" >
  
  <button type="button" class="button1" data-toggle="collapse" data-target="#demo2">Add Details</button>
  <div id="demo2" class="collapse mx-3 my-3">
      <div>
      <div>


      <div class="my-3">
     
     <div class="form-group">
       <label for="exampleInputEmail1">Student Name</label>
       <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="name">
      
     </div>
     <div class="form-group">
       <label for="exampleInputPassword1">gender</label>
       <input type="text" class="form-control" id="exampleInputPassword1"  name="gender">
     </div>

     <div class="form-group">
       <label for="exampleInputPassword1">Class</label>
       <input type="number" class="form-control" id="exampleInputPassword1"  name="class">
     </div>

     <div class="form-group">
       <label for="exampleInputPassword1">Email</label>
       <input type="email" class="form-control" id="exampleInputPassword1"  name="email">
     </div>

     <div class="form-group">
       <label for="exampleInputPassword1">BirthDate</label>
       <input type="date" class="form-control" id="exampleInputPassword1" name="bday">
     </div>

     <div class="form-group">
       <label for="exampleInputPassword1">Phone number</label>
       <input type="varchar"   class="form-control" id="exampleInputPassword1"  name="phnum">
     </div>
 </div>
  </div>
</div>

</div>


<div class="container2 my-5" >
  
  <button type="button" class="button1" data-toggle="collapse" data-target="#demo3">Add Marks</button>
  <div id="demo3" class="collapse mx-3 my-3">
      <div>
      <div>


      <div class="my-3">
     
     <div class="form-group">
       <label for="exampleInputEmail1">Telugu</label>
       <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="telugu">
      
     </div>
     <div class="form-group">
       <label for="exampleInputPassword1">English</label>
       <input type="number" class="form-control" id="exampleInputPassword1"  name="english">
     </div>

     <div class="form-group">
       <label for="exampleInputPassword1">Hindi</label>
       <input type="number" class="form-control" id="exampleInputPassword1"  name="hindi">
     </div>

     <div class="form-group">
       <label for="exampleInputPassword1">Social</label>
       <input type="number" class="form-control" id="exampleInputPassword1"  name="social">
     </div>

     <div class="form-group">
       <label for="exampleInputPassword1">Science</label>
       <input type="number" class="form-control" id="exampleInputPassword1" name="science">
     </div>

     <div class="form-group">
       <label for="exampleInputPassword1">Cp</label>
       <input type="number"   class="form-control" id="exampleInputPassword1"  name="cp">
     </div>
 </div>
  </div>
</div>

</div>

    <div class="regi">
<button type="submit" class="regis" name="register">Register</button>
</div>
<div class="errorr">
 <span><?php echo "$finalmsg";?></span>
</div>


</form>
</div>

</div>
<script>
function myfunction()
{
    var x = document.getElementById("exampleInputPassword1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  }

</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>