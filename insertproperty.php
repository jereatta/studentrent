 

<!DOCTYPE html>
<html>
<head>
	<title>Inser Property </title>

	<!--stylesheets-->
	<!--Bootstarp-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	       <li><a href="index.php">Home</a></li>
	        <li><a href="aboutus.html">About US</a></li>
	        <li><a href="contactus.php">Contact Us</a></li>
	        <li><a href="property.php">Propertys</a></li>
	        <li><a href="insertproperty.php">Insert</a></li>
	        <li><a href="logout.php">Log Out</a></li>

	      </ul>
	      
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>



	<form action="upload.php" method="post" enctype="multipart/form-data">
	<label>Price</label>	
	<input type="number" name="price">

	<br>

	<label>Location</label>
	<select name="town">
		

		<option value="1">Nadur</option>
		<option value="2">Rabat</option>
		<option value="3">Xewkija</option>
		<option value="4">Qala</option>

	</select>

	<br>

	<label>Type</label>

	<select name="type">

		<option value="1">Apartment</option>
		<option value="2">Town House</option>
		

	</select>

	


    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">

    <button name="submit" type="submit" value="submit">Submit</button>
    
</form>


	<?php

	
	require_once'Models/MySQLConnection.php';

	$conn = ConnectToMySQL();


		$query = "SELECT * FROM tbl_property ORDER BY propertyId DESC LIMIT 1";

				 $result = mysqli_query($conn, $query)
		or die("Error in query: ". mysqli_error($conn));

		while ($row = mysqli_fetch_row($result)){

			echo "Last ID in database $row[0]";
		}


	?>



</body>
</html>