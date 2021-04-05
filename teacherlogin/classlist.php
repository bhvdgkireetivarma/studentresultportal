<style>

table {
  position: relative;
  font-family: helvetica;
  border-collapse: collapse;
  width: 100%;
}
td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
.heading{
    text-align:center;
    margin:20px;
    font-family:helvetica;
    font-size:2em;
    border-bottom:1px solid black;
    padding:5px;
}
.verd{
  color:red;
 
}
.up{
  font-family:helvetica;
  margin:3px;
  font-size:1.1em;
}
.passedlist{
  color:green;
  
}
.failedlist{
  color:red;
}

.statistics{

  border:none;
  
  text-align:center;
  margin:20px;
}
.statistics button{
  background-color:#73c9e4;
  border:none;
  color:white;
  font-size:1.3em;
}
</style>



<?php
session_start();
$classnumber=$_SESSION['classnum'];
$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<body>";
echo "<div class='heading'>
Class Students Result
</div>";
$sql="SELECT * FROM studentgrades 
    where class='$classnumber' " ;
     $result=$conn->query($sql);
     echo "<table>";
     echo "<tr>";
         echo "<th>Roll number</th>";
         echo "<th>name</th>";
         echo "<th>Telugu</th>";
         echo "<th>English</th>";
         echo "<th>Hindi</th>";
         echo "<th>Social</th>";
         echo "<th>Science</th>";
         echo "<th>cp</th>";
     echo "</tr>";
     $count=0;
     $total=0;
     $temp=1;
     $count2=0;
     $engcount=0;
     $telcount=0;
     $hincount=0;
     $soccount=0;
     $scicount=0;
     $cpcount=0;
    while($row=$result->fetch_assoc())
    {
      $temp=0;
      $total++;
      $telugu="</td><td>";
      $english="</td><td>";
      $hindi="</td><td>";
      $social="</td><td>";
      $science="</td><td>";
      $CP="</td><td>";
      $roll="<tr><td>";
     
      if($row['Hindi']<35)
      {
        $hincount++;
        $roll="<tr><td class='verd'>";
        $hindi="</td><td class='verd'>";
      }
      if($row['Telugu']<35)
      {
        $telcount++;
        $roll="<tr><td class='verd'>";
        $telugu="</td><td class='verd'>";
      }
      if($row['CP']<35)
      {
        $cpcount++;
        $roll="<tr><td class='verd'>";
        $CP="</td><td class='verd'>";
      }
      if($row['English']<35)
      {
        $engcount++;
        $roll="<tr><td class='verd'>";
        $english="</td><td class='verd'>";
      }
      if($row['Social']<35)
      {
        $soccount++;
        $roll="<tr><td class='verd'>";
        $soical="</td><td class='verd'>";
      }
      if($row['Science']<35)
      {
        $scicount++;
        $roll="<tr><td class='verd'>";
        $science="</td><td class='verd'>";
      }
    if($row['Hindi']<35 || $row['Telugu']<35 || $row['Science']<35 || $row['Social']<35 || $row['CP']<35||$row['English']<35)
    {
      $count++;
    }

        echo $roll.$row['rollnumber']."</td><td>".$row['name'].$telugu.$row['Telugu'].$english. $row['English'].$hindi.$row['Hindi'].$social.

        $row['Social'].$science.$row['Science'].$CP.$row['CP']."</td></tr>";
        

    }
   $conn->close();

   $count2=$total-$count;
      
  

  
    


?>
<?php
if(isset($_POST['submit1']))
{
  session_start();
  $_SESSION['hcount']=$hincount;
  $_SESSION['tcount']=$telcount;
  $_SESSION['ecount']=$engcount;
  $_SESSION['soccount']=$soccount;
  $_SESSION['scicount']=$scicount;
  $_SESSION['ccount']=$cpcount;
  $_SESSION['total']=$total;
  $_SESSION['count']=$count;
  header('location:statistics.php');
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<div class='statistics'>
     <button type='submit' name="submit1">Get Complete Statistics</button>
         </div>    

  </form>
         
    
    </body>