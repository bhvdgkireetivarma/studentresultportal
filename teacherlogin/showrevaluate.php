<style>

table {
  font-family: arial, sans-serif;
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
}


</style>



<?php
session_start();

$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<body>";
echo "<div class='heading'>
Class Students Revaluationlist
</div>";
$teacherid=$_SESSION['teacherid'];
$sql="SELECT * FROM teacherstudent,studentevaluatuion 
where teacherstudent.studentid=studentevaluatuion.roll and teacherstudent.teacherid='$teacherid' "
    ;
     $result=$conn->query($sql);
     echo "<table>";
     echo "<tr>";
         echo "<th>Roll number</th>";
         echo "<th>Telugu</th>";
         echo "<th>Hindi</th>";
         echo "<th>English</th>";
         echo "<th>Social</th>";
         echo "<th>Science</th>";
         echo "<th>Cp</th>";
     echo "</tr>";
    while($row=$result->fetch_assoc())
    {
        $checkedtelugu;
        $checkedenglish;
        $checkedhindi;
        $checkedsocial;
        $checkedscience;
        $checkedcp;
        if($row['Telugu']==1)
        {
            $checkedtelugu="<img src='check.png' height='30px'></img>";
        }
        else{
            $checkedtelugu="<img src='wrong.png' height='30px'></img>";
        }
        if($row['English']==1)
        {
            $checkedenglish="<img src='check.png' height='30px'></img>";
        }
        else{
            $checkedenglish="<img src='wrong.png' height='30px'></img>";
        }
        if($row['Hindi']==1)
        {
            $checkedhindi="<img src='check.png' height='30px'></img>";
        }
        else{
            $checkedhindi="<img src='wrong.png' height='30px'></img>";
        }
        if($row['Science']==1)
        {
            $checkedscience="<img src='check.png' height='30px'></img>";
        }
        else{
            $checkedscience="<img src='wrong.png' height='30px'></img>";
        }
        if($row['Social']==1)
        {
            $checkedsocial="<img src='check.png' height='30px'></img>";
        }
        else{
            $checkedsocial="<img src='wrong.png' height='30px'></img>";
        }
        if($row['Cp']==1)
        {
            $checkedcp="<img src='check.png' height='30px'></img>";
        }
        else{
            $checkedcp="<img src='wrong.png' height='30px'></img>";
        }
       
       
       


        echo "<tr><td>".$row['roll']."</td><td>".$checkedtelugu."</td><td>".$checkedhindi."</td><td>".$checkedenglish."</td><td>".$checkedsocial."</td><td>".$checkedscience."</td><td>".$checkedcp."</td></td>";

       
    }
   

    echo "</body>";


?>
