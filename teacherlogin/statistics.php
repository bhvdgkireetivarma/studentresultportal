
<style>
    .main{
    display: flex;
    flex-wrap:wrap;
    margin-left:auto;
margin-right:auto;
    }
    .head{
        font-family:helvetica;
        text-align:center;
        border-bottom:1px solid black;
    }
    </style>
<?php
session_start();
$failed=$_SESSION['count'];
$total=$_SESSION['total'];
$telcount=$_SESSION['tcount'];
$engcount=$_SESSION['ecount'];
$soccount=$_SESSION['soccount'];
$scicount=$_SESSION['scicount'];
$ccount=$_SESSION['ccount'];
$hcount=$_SESSION['hcount'];
?>
<div class="head">
    <h3>Complete Statistics</h3>
</div>
<div class="main">

    <div class=" chart first">

    <div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Failed', <?php echo $failed;?>],
  ['passed', <?php  echo $total-$failed;?>],
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Student Verdict', 'width':500, 'height':350,
    colors: ['red', 'green']};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</div>
<div class="chart second">

<div id="piechart1"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Subject', 'Count'],

['failed', <?php  echo $telcount;?>],
['Passed', <?php  echo $total-$telcount;?>],


]);

// Optional; add a title and set the width and height of the chart
var options = {'title':'Telugu', 'width':500, 'height':350,
    colors: ['red', 'green']};

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
chart.draw(data, options);
}
</script>
</div>

<div class="chart third">

<div id="piechart2"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Subject', 'Count',{role:'style'}],
['Failed', <?php echo $engcount;?>,'red'],
['Passed', <?php  echo $total-$engcount;?>,'green'],


]);

// Optional; add a title and set the width and height of the chart
var options = {'title':'English', 'width':500, 'height':350,
    colors: ['red', 'green']};

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
chart.draw(data, options);
}
</script>
</div>




<div class="chart fourth">

<div id="piechart3"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Subject', 'Count',{role:'style'}],
['Failed', <?php echo $hcount;?>,'red'],
['Passed', <?php  echo $total-$hcount;?>,'green'],


]);

// Optional; add a title and set the width and height of the chart
var options = {'title':'Hindi', 'width':500, 'height':350,
    colors: ['red', 'green']};

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
chart.draw(data, options);
}
</script>
</div>




<div class="chart fifth">

<div id="piechart4"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Subject', 'Count',{role:'style'}],
['Failed', <?php echo $soccount;?>,'red'],
['Passed', <?php  echo $total-$soccount;?>,'green'],


]);

// Optional; add a title and set the width and height of the chart
var options = {'title':'Social', 'width':500, 'height':350,
    colors: ['red', 'green']};

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
chart.draw(data, options);
}
</script>
</div>




<div class="chart six">

<div id="piechart5"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Subject', 'Count',{role:'style'}],
['Failed', <?php echo $scicount;?>,'red'],
['Passed', <?php  echo $total-$scicount;?>,'green'],


]);

// Optional; add a title and set the width and height of the chart
var options = {'title':'Science', 'width':500, 'height':350,
    colors: ['red', 'green']};

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
chart.draw(data, options);
}
</script>
</div>


<div class="chart seven">

<div id="piechart6"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Subject', 'Count',{role:'style'}],
['Failed', <?php echo $ccount;?>,'red'],
['Passed', <?php  echo $total-$ccount;?>,'green'],


]);

// Optional; add a title and set the width and height of the chart
var options = {'title':'CP', 'width':500, 'height':350,
    colors: ['red', 'green']};

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('piechart6'));
chart.draw(data, options);
}
</script>
</div>
</div>