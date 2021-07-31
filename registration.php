<?php
    $insert=false;
    if(isset($_POST['name'])){
       //Set connections variables
    $server="localhost";
    $username="root";
    $password="";

    //CREATE connection
    $con = mysqli_connect($server,$username,$password);
    
    //Check for connection success
    if(!$con)
    {
        die("connection to this database failed due to " . mysqli_connect_error());
    }

    //collect post variables
    $name=$_POST['name']; 
    $usn=$_POST['usn']; 
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $status=$_POST['status'];
    

    if($status=="Partially Vaccinated")
    {
        $sql = "INSERT INTO `project1`.`partially vaccinated` (`NAME`, `USN`, `email`, `phone`, `Status`) VALUES 
        ('$name', '$usn', '$email', '$phone','$status');";

       
    }
    else if($status=="Fully Vaccinated")
    {
        $sql = "INSERT INTO `project1`.`fully vaccinated` (`NAME`, `USN`, `email`, `phone`, `Status`) VALUES 
        ('$name', '$usn', '$email', '$phone','$status');";

       
    }
    else
    {
        $sql = "INSERT INTO `project1`.`not vaccinated` (`NAME`, `USN`, `email`, `phone`, `Status`) VALUES 
        ('$name', '$usn', '$email', '$phone','$status');";
    }
    
    $sql1 = "INSERT INTO `project1`.`common table` (`NAME`, `USN`, `email`, `phone`, `Status`) VALUES 
    ('$name', '$usn', '$email', '$phone','$status');";
    //Execute the query
    if($con->query($sql)==TRUE)
    {
        $insert=true;
    }
    if($con->query($sql1)==TRUE)
    {
       
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

   
    //Close the database cnnection
    $con->close(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="covid19Wap.css">
            
    
    <title>Document</title>
    <style type="text/css">
    *
{
    margin:0px;
    padding:0px;
    box-sizing: border-box;
    
    
}
body{
    /* background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 100%, rgba(9,9,121,1) 100%, rgba(1,184,236,1) 100%, rgba(0,212,255,1) 100%); */
background-color: #87cae4;
}
.container
{
    max-width: 80%;
    padding:24px;
    margin:23px auto;
}
.container h2{
    text-align: center; 
    font-family: 'Roboto', sans-serif;
}
h2{
    font-weight:bold;
    font-size: 30px;
    color: white;

}
p{
    color:green;
    font-size:20px;
    text-align: center;
}
input,select{
    display:block;
    border:2px solid black;
    border-radius: 6px;
    outline:none;
    width:80%;
    font-size: 25px;
    margin:10px;
    padding:7px;
}

form
{
    display:flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;

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
    
    <div class="container">
        
        <h2>Welcome to Registration Section</h1>
        <?php
        if($insert==true)
        {
            echo "<p class='SubmitMsg'>Thanks for submitting your form.</p>";
        }
            
        ?> 
        
            <br>
        <form action="registration.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name ">
            <input type="text" name="usn" id="usn" placeholder="Enter your usn ">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <select name="status" id="status" >
                <option value="" disabled selected>Select your option</option>
                <option value="Partially Vaccinated">
                    Partially Vaccinated
                </option>
                <option value="Fully Vaccinated">
                 Fully Vaccinated
                </option>
                <option value="Not Vaccinated">
                    Not Vaccinated
                </option>
            </select>
            <button class="btn btn-success">Submit</button>
        </form>

    </div>
    
</body>
</html>