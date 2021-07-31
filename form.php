<?php
$insert=false;
if(isset($_POST['firstname'])){

$server="localhost";
$username="root";
$password=""; 

$con = mysqli_connect($server,$username,$password);

if(!$con)
{
    die("Connection to this database failed due to " .mysqli_connect_error());
}
$first_name=$_POST['firstname'];
$last_name=$_POST['lastname'];
$email=$_POST['email'];
$phone_number=$_POST['pn'];
$aadhaar_card_number=$_POST['acn'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$bloodgroup=$_POST['bg']; 

$sql= "INSERT INTO `project1`.`covidtest1` (`First Name`, `Last Name`, `email`, `phone`, `Aadhaar No`, `Age`, `Gender`, `BloodGrp`)
VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$aadhaar_card_number', '$age', '$gender', '$bloodgroup');";
if($con->query($sql)==TRUE)
{
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();
}

?>

<!DOCTYPE html>
<html>
    <head>
        
        <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="covid19Wap.css"> 
        <title>Document</title>
    <style type="text/css">
    body{
    background-color: #87cae4;
    font-family: 'Raleway', sans-serif;
}
#testform{
    width: 40%;
    margin: 0 auto;
    margin-top: 100px;
    border: medium solid white;
    box-shadow: 3px 3px 30px black;
    padding: 20px;
    background-color: #ffffff;
    font-size: 20px;
}
input{
    margin: 10px;
    height: 25px;
    font-size: 20px;
}
#gen{
    margin: 10px;
}
#btns{
    text-align: right;
}
p{
    color:black;
    font-size:20px;
    text-align: center;
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
	<!--NAVBAR END-->

    <br>
    <br>
    <br>
    <br>

    <?php
        if($insert==true)
        {
            echo "<p class='SubmitMsg'>Thanks for submitting your form.</p>";
        }
            
        ?> 
        <div id="testform">
            <form action="form.php" method="POST">

                <h1 style="text-align: center; padding-bottom: 15px;">Enter your details</h1>

                <label for="firstname">First name:</label>
                <input type="text" placeholder="Enter first name" id="firstname" name="firstname">

                <label for="lastname">Last name:</label>
                <input type="text" placeholder="Enter last name" id="lastname" name="lastname">
                <br>

                <label for="email">Email id:</label>
                <input type="email" placeholder="Enter your email id" id="email" name="email">
                <br>

                <label for="pn">Phone No.:</label>
                <input type="number" placeholder="Enter your phone No." id="pn" name="pn">
                <br>

                <label for="acn">Aadhaar card No.:</label>
                <input type="number" placeholder="Aadhaar card No." id="acn" name="acn">
                <br>

                <label for="age">Age:</label>
                <input type="number" placeholder="Age" id="age" style="width: 60px;" name="age">
                <br>
                
                <label for="gender" style="margin-right: 20px; margin-left: 0;">Gender:</label>
                <label for="male">male</label>
                <input type="radio" name="gender" id="male">
                <label for="female">female</label>
                <input type="radio" name="gender" id="female">
                <label for="others">others</label>
                <input type="radio" name="gender" id="others">
                <br>
                <br>


                <label for="bg">Select blood group</label>
                <select id="bg" name="bg">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <br>

                
                <div id="btns">
                <input type="submit" class="btns" style="height: 30px; width: 90px; font-size: 18px;">
                <input type="reset" class="btns" style="height: 30px; width: 90px; font-size: 18px;">
                </div>
        </div>
        
    </body>
</html>