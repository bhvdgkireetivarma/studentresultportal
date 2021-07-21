
<?php 

session_start();
$finalmsg="";
$roll=$_SESSION['rollno'];
$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$telugu=0;
$english=0;
$hindi=0;
$social=0;
$science=0;
$cp=0;

if(isset($_POST['submitrevaluation'])){
if(isset($_POST['tel'])){
    $telugu=1;
}
if(isset($_POST['Eng'])){
    $english=1;
}
if(isset($_POST['Hin'])){
    $hindi=1;
}
if(isset($_POST['Soc'])){
    $social=1;
}
if(isset($_POST['Sci'])){
    $science=1;
}
if(isset($_POST['cp'])){
    $cp=1;
}


$sql="UPDATE studentevaluatuion SET Telugu='$telugu' , English= '$english',Hindi ='$hindi', Social= '$social',Science ='$science',Cp='$cp' 
WHERE roll='$roll' ";
$result=$conn->query($sql);
if($result){
    $finalmsg="success";

}
else{
    $finalmsg="failed";
}


}
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>reevaluation</title>
  <link rel="stylesheet" href="reevaluation.css?version=1">

</head>

<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="heading">
    <h2>
        Request Re-evaluation
    </h2>
</div>
<div class="total">
<div class="main one">
    <table>
        <tr>
            <th>
                SUBJECT
            </th>
            <th>
                REQUEST
            </th>
        </tr>
        <tr>
            <td>
                Telugu
            </td>
            <td>
                <input type="checkbox" onclick="funct(this)" value="TELUGU"  name="tel">
                
            </td>
        </tr>
        <tr>
            <td>
                English
            </td>
            <td>
                <input type="checkbox" onclick="funct(this)" value="ENGLISH" name="Eng">
                
            </td>
        </tr>
        <tr>
            <td>
                Hindi
            </td>
            <td>
                <input type="checkbox" onclick="funct(this)" value="HINDI"  name="Hin">
                
            </td>
        </tr>
        <tr>
            <td>
                Social
            </td>
            <td>
                <input type="checkbox" onclick="funct(this)" value="SOCIAL" name="Soc">
                
            </td>
        </tr>
        <tr>
            <td>
                Science
            </td>
            <td>
                <input type="checkbox" onclick="funct(this)" value="SCIENCE" name="Sci">
                
            </td>
        </tr>
        <tr>
            <td>
                CP
            </td>
            <td>
                <input type="checkbox" onclick="funct(this)" value="CP" name="cp">
                
            </td>
        </tr>
    </table>
  
</div>
<div>
<button class="btn btn-info btn-lg" type="submit" name="submitrevaluation">submit</button>

</div>
<div>
 <span><?php echo "$finalmsg";?></span>
</div>
<div class="main two">
    <div class="subhead">
        SUBJECTS ADDED
    </div>
    <div id="subjects" class="subs">
        <div id="deltemp">No Subject added</div>
    </div>
    
</div>
</div>
</form>
<script>
   var t=0;
    function funct(obj)
    {


        var b=document.getElementById('subjects');
        if(obj.checked==true)
        {
        var c=document.createElement('div');
        c.innerHTML=obj.value;
        c.id=obj.value;
        c.className='subsss';
        b.appendChild(c);
    t++;
        }
        else{
            
            var d=document.getElementById(obj.value);
b.removeChild(d);
t--;

        }
        if(t!=0)
        {
            b.removeChild(document.getElementById('deltemp'));
        }
        if(t==0)
{
    var e=document.createElement('div');
    e.innerHTML='No Subject Added';
    e.id='deltemp';
    b.appendChild(e);
}

       
    }
</script>
</body>
</html>