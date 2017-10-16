<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

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
	      </ul>
	      
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>


	<h1 style="text-align: center;">Home</h1>




<?php

	echo '<div class="media">';
echo '<div class="media-left">';
require_once'Models/MySQLConnection.php';

$conn = ConnectToMySQL();

		$query =  "SELECT 

						 tbl_property.propertyId, tbl_property.price,tbl_property.type,tbl_town.townId 

				  FROM 

				  		tbl_property 


				  INNER JOIN 

				  		tbl_town 

				  On 
				  		tbl_town.townId = tbl_property.locationId 

 
				  


				  ORDER BY 

				  	tbl_property.propertyId DESC

				  LIMIT 3"
				  		
				  ;

		$result = mysqli_query($conn, $query)
		or die("Error in query: ". mysqli_error($conn));
		while ($row = mysqli_fetch_row($result)){


		$id = $row[0];


		
		$outputimg = "<img class='media-object' src='images/propertys/{$id}.jpg'  alt='...'' height='164px' width='164px' >";

		



?>
	
	    <a href="#" >
	      <?php echo $outputimg; ?>
	    </a>
	  </div>
	  <div class="media-body">
	    
	    
	    <?php
	    
		echo "Price:$row[1] <br> Type: $row[2] <br> Location: $row[3] ";
		echo "</div>";
		echo "</div>";
}
		?>






</body>
</html>