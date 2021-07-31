<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="covid19Wap.css">
<title>Using single SQL</title>
<style>
table,td,th
{
 padding:10px;
 border-collapse:collapse;
 font-family:Georgia, "Times New Roman", Times, serif;
 border:solid #ddd 2px;
}

body{
    background-color: #87cae4; 
}
#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
h2
{
    text-align:center;
    font-weight:2000;
}
button
{
    margin-left:10px;
}
</style>
</head>
<body>


<nav id="mainNavbar" class="navbar navbar-dark navbar-expand-md py-0 fixed-top">
    	<a class="navbar-brand" href="covid19Wap.html">Covi-Care</a>
      <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
    aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
    <div class="animated-icon1"><span></span><span></span><span></span></div>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent20">

    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="covid19Wap.html">HOME<span class="sr-only">(current)</span></a>
      </li>
  </ul>
      <ul class="navbar-nav ml-auto">
      </ul>
    </ul>	
  </div>
  <div>
	<ul class="navbar-nav ">
		<li class="nav-item">
			<a class="nav-link" href="registration.php">Registration</a>
			</li>
            <li class="nav-item">
			<a class="nav-link" href="printinfo.php">Details</a>
			</li>
			</ul>			

	  </div>

    
</nav>



<br>
<br>
<br>
<br>
<br>



    <h2>Total Data</h2>
    <br>
<table id="customers" align="center" border="1" width="100%">
<tr>
<th>Name</th>
<th>USN</th>
<th>email</th>
<th>phone</th>
<th>Status</th>
</tr>
<?php
$con = mysqli_connect("localhost","root","","project1");
$query=mysqli_query($con,"select * from `common table` order by Status");
while($row=mysqli_fetch_array($query))
{
    ?>
    <tr>
        <td><p><?php echo $row['NAME']; ?></p></td>
        <td><p><?php echo $row['USN']; ?></p></td>
        <td><p><?php echo $row['email']; ?></p></td>
        <td><p><?php echo $row['phone']; ?></p></td>
        <td><p><?php echo $row['Status']; ?></p></td>
        </tr>

    <?php
}

?>

</table>
<br>
<br>

<button onclick="exportData()">
   <span class="glyphicon glyphicon-download"></span>
   Download list
</button>

<script type="text/javascript" src="downloadfile.js"></script>
</body>
</html>