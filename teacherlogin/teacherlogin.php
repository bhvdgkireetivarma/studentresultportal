
    <link rel="stylesheet" href="teacherlogin.css?version=1"/>
    <?php
$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$teacherid=$_SESSION['teacherid'];
$sql="SELECT * FROM teacher_details WHERE
id='$teacherid'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$name=$row['teachername'];

$gender=$row['gender'];
$start="";
if($gender=="female")
{
    $start="Mrs";

}
else{
    $start="Mr";
}


?>
<?php 
$error1="";
$error2="";
$error3="";
$error5="";
$error4="";
if(isset($_POST['submit1']))
{
    $roll1=$_POST['studentroll1'];
$class1=$_POST['studentclass1'];
    
    if($roll1!=""&&$class1!="")
    {

        $sql3="SELECT COUNT(*) as cnt FROM student_details WHERE roll=$roll1 and class=$class1";
        $result=$conn->query($sql3);
        $row=$result->fetch_assoc();
        $count=$row['cnt'];
        if($count>0)
        {
        session_start();
        $_SESSION['studentroll']=$roll1;
        header('location:http://localhost/studentresultportal/studentlogin/result.php');
        }
        else{
$error1="*";
        }
    }
  
}
if(isset($_POST['submit2']))
{
    $roll2=$_POST['studentroll2'];
    $class2=$_POST['studentclass2'];
    
    if($roll2!=""&&$class2!="")
    {
        
        $sql4="SELECT COUNT(*) as cnt1 FROM student_details WHERE roll=$roll2 and class=$class2 ";
        $result1=$conn->query($sql4);
        $row1=$result1->fetch_assoc();
        $count1=$row1['cnt1'];
        if($count1>0)
        {
        session_start();
        $_SESSION['studentroll']=$roll2;
        header('location:studnetdetails.php');
        }
        else{
$error2="*";
        }
    }
  
}
if(isset($_POST['submit3']))
{
    $roll3=$_POST['studentroll3'];
    $class3=$_POST['studentclass3'];
    
    if($roll3!=""&&$class3!="")
    {
        
        $sql9="SELECT COUNT(*) as cnt1 FROM student_details WHERE roll=$roll3 and class=$class3 ";
        $result9=$conn->query($sql9);
        $row9=$result9->fetch_assoc();
        $count9=$row9['cnt1'];
        if($count9>0)
        {
        session_start();
        $_SESSION['studentroll']=$roll3;
        header('location:editresult.php');
        }
        else{
$error3="*";
        }
    }
  
}
if(isset($_POST['submit4']))
{
    $roll4=$_POST['studentroll4'];
    $class4=$_POST['studentclass4'];
    
    if($roll4!=""&&$class4!="")
    {
        
        $sql8="SELECT COUNT(*) as cnt1 FROM student_details WHERE roll=$roll4 and class=$class4 ";
        $result8=$conn->query($sql8);
        $row8=$result8->fetch_assoc();
        $count8=$row8['cnt1'];
        if($count8>0)
        {
        session_start();
        $_SESSION['studentroll']=$roll4;
        header('location:editdetails.php');
        }
        else{
$error4="*";
        }
    }
  
}
if(isset($_POST['submit5']))
{
    $name5=$_POST['studentname5'];
    $class5=$_POST['studentclass5'];

    if($name5!=""&&$class5!="")
    {

        $sql5="SELECT COUNT(*) as cnt5 FROM student_details WHERE studentname='$name5' and class='$class5' ";
        $result5=$conn->query($sql5);
        $row5=$result5->fetch_assoc();
        $count5=$row5['cnt5'];
        if($count5==0)
        {
        
        
        header('location:addstudent.php');
        }
        else{
$error5="*";
        }
    }
  
}
if(isset($_POST['submit11']))
{
  session_start();
  $_SESSION['classnum']=$_POST['classlist1'];
  header('location:classlist.php');
}

if(isset($_POST['submit22']))
{
  session_start();
  $_SESSION['classnum']=$_POST['classlist2'];
  header('location:classlistchecked.php');
}
?>

<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="body1">
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

<div class="main">
    <div class="container">
<div class="model1 first">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Student Result</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Student Result</h4>
        </div>
        <div class="modal-body">
            <div class="head first">
                <div class="headline">
                    Student Result
                </div>
                <div class="below">
                <div> 
                    Student Roll
                </div>
                
                <div>
                    <input type="number" name="studentroll1"/><span><?php echo "$error1"; ?></span>
                </div>
                <div>
                     Class
                </div>
                <div>
                    <input type="number" name="studentclass1"/><span><?php echo "$error1"; ?></span>
                </div>
                <div>
                    <button type="submit" name="submit1">Get Result</button>
                </div>
                
                </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
<div class="model1 second">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Student details</button>
  
    <!-- Modal -->
    <div class="modal fade" id="myModal2" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Student Details</h4>
          </div>
          <div class="modal-body">
            <div class="head second">
                <div class="headline">
                    Student Details
                </div>
                <div class="below">
                <div> 
                    Student Roll
                </div>
                
                <div>
                    <input type="number" name="studentroll2"/><span><?php echo "$error2"; ?></span>
                </div>
                <div>
                     Class
                </div>
                <div>
                    <input type="number" name="studentclass2"/><span><?php echo "$error2"; ?></span>
                </div>
                <div>
                    <button type="submit" name="submit2">Get Details</button>
                </div>
                </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="model1 third">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">Edit Student Result</button>
  
    <!-- Modal -->
    <div class="modal fade" id="myModal3" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Result</h4>
          </div>
          <div class="modal-body">
            <div class="head third">
                <div class="headline">
                    Edit Result
                </div>
                <div class="below">
                <div> 
                    Student Roll
                </div>
                
                <div>
                    <input type="number" name="studentroll3"/><span><?php echo "$error3"; ?></span>
                </div>
                <div>
                     Class
                </div>
                <div>
                    <input type="number" name="studentclass3"/><span><?php echo "$error3"; ?></span>
                </div>
                <div>
                    <button type="submit" name="submit3">Edit Result</button>
                </div>
                
                </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="model1 fourth">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">Edit Student details</button>
  
    <!-- Modal -->
    <div class="modal fade" id="myModal4" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Details</h4>
          </div>
          <div class="modal-body">
            <div class="head four">
                <div class="headline">
                    Edit Details
                </div>
                <div class="below">
                <div> 
                    Student Roll
                </div>
                
                <div>
                    <input type="number" name="studentroll4"/><span><?php echo "$error4"; ?></span>
                </div>
                <div>
                     Class
                </div>
                <div>
                    <input type="number" name="studentclass4"/><span><?php echo "$error4"; ?></span>
                </div>
                <div>
                    <button type="submit" name="submit4">Edit details</button>
                </div>
                
                </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="model1 fifth">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">Add Student</button>
  
    <!-- Modal -->
    <div class="modal fade" id="myModal5" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Student</h4>
          </div>
          <div class="modal-body">
            <div class="head five">
                <div class="headline">
                    Add Student
                </div>
                <div class="below five">
                <div> 
                    Student Name
                </div>
                
                <div>
                    <input type="Varchar" name="studentname5"/><span><?php echo "$error5"; ?></span>
                </div>
                <div>
                     Class
                </div>
                <div>
                    <input type="number" name="studentclass5"/><span><?php echo "$error5"; ?></span>
                </div>
                
                <div>
                    <button type="submit" name="submit5">Add Student</button>
                </div>
                </div>
                
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="model1 fifth">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6">Add Student</button>
  
    <!-- Modal -->
    <div class="modal fade" id="myModal6" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Student</h4>
          </div>
          <div class="modal-body">
            
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="model1 fifth">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal7">Add Student</button>
  
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Student</h4>
          </div>
          <div class="modal-body">
           
                
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  

</div>

</div>
<div class="namee">
   <h1> WELCOME<?php echo " $start ";?> <?php echo "$name"; ?></h1>
</div>

<div class="lister">
<div class="list one">
<div class="listheading">
Get Whole Class List
</div>

<div class="selectlist">
<select name="classlist1" >
<option  value="1">1st Class</option>
<option  value="2">2nd Class</option>
<option  value="3">3rd Class</option>
<option  value="4">4th Class</option>
<option  value="5">5th Class</option>
<option  value="6">6th Class</option>
<option  value="7">7th Class</option>
<option  value="8">8th Class</option>
<option  value="9">9th Class</option>
<option  value="10">10th Class</option>
</select>
</div>
<div class="listbutton">
  <button type="submit" name="submit11">Get List</button>
</div>

</div>

<div class="list two">
<div class="listheading">
Get Checked Student list
</div>

<div class="selectlist">
<select name="classlist2">
<option  value="1">1st Class</option>
<option  value="2">2nd Class</option>
<option  value="3">3rd Class</option>
<option  value="4">4th Class</option>
<option  value="5">5th Class</option>
<option  value="6">6th Class</option>
<option  value="7">7th Class</option>
<option  value="8">8th Class</option>
<option  value="9">9th Class</option>
<option  value="10">10th Class</option>
</select>
</div>
<div class="listbutton">
  <button type="submit" name="submit22" >Get List</button>
</div>

</div>



<div class="list two">
<div class="listheading">
Get Failed Student list
</div>

<div class="selectlist">
<select name="classlist3">
<option  value="1">1st Class</option>
<option  value="2">2nd Class</option>
<option  value="3">3rd Class</option>
<option  value="4">4th Class</option>
<option  value="5">5th Class</option>
<option  value="6">6th Class</option>
<option  value="7">7th Class</option>
<option  value="8">8th Class</option>
<option  value="9">9th Class</option>
<option  value="10">10th Class</option>
</select>
</div>
<div class="listbutton">
  <button type="submit" name="submit33" >Get List</button>
</div>

</div>

</div>


<div class="footer">
  
    <img  class="cali" src="calicut_logo.png" height="100px" >
    <div class="logos">
    <ul>
        <li><a href="https://www.facebook.com/" target="_blank"><img src="facebook.png" height="25px" ></a></li>
        <li><a href="https://www.youtube.com/" target="_blank"><img src="youtube.png" height="25px"></a></li>
        <li><a href="https://www.instagram.com/" target="_blank"><img src="instagram.png" height="25px"></a></li>
            
</ul>
</div>

</div>


</form>



</body>
