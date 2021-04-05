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
$classnumber=$_SESSION['classnum'];
$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<body>";
echo "<div class='heading'>
Class Students Result
</div>";
$sql="SELECT * FROM studentcheck 
    WHERE class='$classnumber'";
     $result=$conn->query($sql);
     echo "<table>";
     echo "<tr>";
         echo "<th>Roll number</th>";
         echo "<th>name</th>";
         echo "<th>Class</th>";
         echo "<th>checked</th>";
     echo "</tr>";
    while($row=$result->fetch_assoc())
    {
        $checked;
        if($row['checked']==1)
        {
            $checked="<img src='check.png' height='30px'></img>";
        }
        else{
            $checked="<img src='wrong.png' height='30px'></img>";
        }


        echo "<tr><td>".$row['rollnumber']."</td><td>".$row['name']."</td><td>". $row['class']."</td><td>".$checked."</td></td>";

       
    }
   

    echo "</body>";


?>
