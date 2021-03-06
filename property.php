<?php  
 //entry.php  
 session_start(); 

 if(isset($_SESSION["username"]))  
 {  
      header("location:propertymanage.php");  
 }  
?>  

<!DOCTYPE html>
<html>
<head>
	<title></title>

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
	        <li><a href="Login.php">Login</a></li>
	      </ul>
	      
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

 


	
<form method="post" action="property.php">
<select name="option">
  <option value="location">Location</option>
  <option value="price">Price</option>
  <option value="type">Property Type</option>
</select>


<input type="radio" name="order" value="ascending"> Ascending
<input type="radio" name="order" value="descanding"> Descanding

<button name="submit" type="submit"> Submit</button>
</form>
	  
<?php
if(isset($_POST['submit'])) 
{
	$option = $_POST['option'];
	$order = $_POST['order'];


//Beging of Location ascesndings
	if ($option == "location" && $order == "ascending" ) {

		echo '<div class="media">';
echo '<div class="media-left">';

$conn = mysqli_connect("localhost", "root", "root", "AlastairMicallef_4.2B"); if (mysqli_connect_errno()){
		echo "Error: Could not connect to database. Please try again later";
		exit; }

		$query =  "SELECT 
						 tbl_property.propertyId,tbl_property.propertyId, tbl_property.price,tbl_type.type,tbl_town.town 
				  FROM 
				  		tbl_property

				  

				  INNER JOIN 
				  		tbl_town 

				  On 
				  		tbl_town.townId = tbl_property.locationId 

 
				  INNER JOIN 
				  		tbl_type
				  		
				  ON 

				  	tbl_type.typeid = tbl_property.type


				  ORDER BY 

				  	tbl_town.town ASC"
				  		
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
	    
		echo "Price:$row[2] <br> Type: $row[3] <br> Location: $row[4] ";
		echo "</div>";
		echo "</div>";
}


		
	}//Ends of Location ascesnding

	//Begin of Location Descanding
	else if ($option == "location" && $order == "descanding" ) {
		

		echo '<div class="media">';
echo '<div class="media-left">';

$conn = mysqli_connect("localhost", "root", "", "AlastairMicallef_4.2B"); if (mysqli_connect_errno()){
		echo "Error: Could not connect to database. Please try again later";
		exit; }

		$query =  "SELECT 
						 tbl_property.propertyId,tbl_property.propertyId, tbl_property.price,tbl_type.type,tbl_town.town 
				  FROM 
				  		tbl_property

				  

				  INNER JOIN 
				  		tbl_town 

				  On 
				  		tbl_town.townId = tbl_property.locationId 

 
				  INNER JOIN 
				  		tbl_type
				  		
				  ON 

				  	tbl_type.typeid = tbl_property.type


				  ORDER BY 

				  	tbl_town.town DESC"
				  		
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
	    
		echo "Price:$row[2] <br> Type: $row[3] <br> Location: $row[4] ";
		echo "</div>";
		echo "</div>";
}


	}//Ends of Location Descending

	//Begings of Price Ascesnding
	else if ($option == "price" && $order == "ascending" ) {
		

		echo '<div class="media">';
echo '<div class="media-left">';

$conn = mysqli_connect("localhost", "root", "", "AlastairMicallef_4.2B"); if (mysqli_connect_errno()){
		echo "Error: Could not connect to database. Please try again later";
		exit; }

		$query =  "SELECT 
						 tbl_property.propertyId,tbl_property.propertyId, tbl_property.price,tbl_type.type,tbl_town.town 
				  FROM 
				  		tbl_property

				  

				  INNER JOIN 
				  		tbl_town 

				  On 
				  		tbl_town.townId = tbl_property.locationId 

 
				  INNER JOIN 
				  		tbl_type
				  		
				  ON 

				  	tbl_type.typeid = tbl_property.type


				  ORDER BY 

				  	tbl_property.price ASC"
				  		
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
	    
		echo "Price:$row[2] <br> Type: $row[3] <br> Location: $row[4] ";
		echo "</div>";
		echo "</div>";
}


	}//Ends of Price Ascending

	//Begings of Price Descending
	else if ($option == "price" && $order == "descanding" ) {
		

		echo '<div class="media">';
echo '<div class="media-left">';

$conn = mysqli_connect("localhost", "root", "", "AlastairMicallef_4.2B"); if (mysqli_connect_errno()){
		echo "Error: Could not connect to database. Please try again later";
		exit; }

		$query =  "SELECT 
						 tbl_property.propertyId,tbl_property.propertyId, tbl_property.price,tbl_type.type,tbl_town.town 
				  FROM 
				  		tbl_property

				  

				  INNER JOIN 
				  		tbl_town 

				  On 
				  		tbl_town.townId = tbl_property.locationId 

 
				  INNER JOIN 
				  		tbl_type
				  		
				  ON 

				  	tbl_type.typeid = tbl_property.type


				  ORDER BY 

				  	tbl_property.price DESC"
				  		
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
	    
		echo "Price:$row[2] <br> Type: $row[3] <br> Location: $row[4] ";
		echo "</div>";
		echo "</div>";
}


	}//Ends of Price Descening


	//Begings of Type Ascending
	else if ($option == "type" && $order == "ascending" ) {
		

		echo '<div class="media">';
echo '<div class="media-left">';

$conn = mysqli_connect("localhost", "root", "", "AlastairMicallef_4.2B"); if (mysqli_connect_errno()){
		echo "Error: Could not connect to database. Please try again later";
		exit; }

		$query =  "SELECT 
						 tbl_property.propertyId,tbl_property.propertyId, tbl_property.price,tbl_type.type,tbl_town.town 
				  FROM 
				  		tbl_property

				  

				  INNER JOIN 
				  		tbl_town 

				  On 
				  		tbl_town.townId = tbl_property.locationId 

 
				  INNER JOIN 
				  		tbl_type
				  		
				  ON 

				  	tbl_type.typeid = tbl_property.type


				  ORDER BY 

				  	tbl_type.type ASC"
				  		
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
	    
		echo "Price:$row[2] <br> Type: $row[3] <br> Location: $row[4] ";
		echo "</div>";
		echo "</div>";
}


	}//Ends of Type Ascending

	//Begings of Type descending
	else if ($option == "type" && $order == "descanding" ) {
		

		echo '<div class="media">';
echo '<div class="media-left">';

$conn = mysqli_connect("localhost", "root", "", "AlastairMicallef_4.2B"); if (mysqli_connect_errno()){
		echo "Error: Could not connect to database. Please try again later";
		exit; }

		$query =  "SELECT 
						 tbl_property.propertyId,tbl_property.propertyId, tbl_property.price,tbl_type.type,tbl_town.town 
				  FROM 
				  		tbl_property

				  

				  INNER JOIN 
				  		tbl_town 

				  On 
				  		tbl_town.townId = tbl_property.locationId 

 
				  INNER JOIN 
				  		tbl_type
				  		
				  ON 

				  	tbl_type.typeid = tbl_property.type


				  ORDER BY 

				  	tbl_type.type DESC"
				  		
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
	    
		echo "Price:$row[2] <br> Type: $row[3] <br> Location: $row[4] ";
		echo "</div>";
		echo "</div>";
}


	}//Ends of Type Descending

	
}else{

echo '<div class="media">';
echo '<div class="media-left">';

$conn = mysqli_connect("localhost", "root", "root", "AlastairMicallef_4.2B"); if (mysqli_connect_errno()){
		echo "Error: Could not connect to database. Please try again later";
		exit; }

		$query =  "SELECT 
						 tbl_property.propertyId,tbl_property.propertyId, tbl_property.price,tbl_type.type,tbl_town.town 
				  FROM 
				  		tbl_property 
				  INNER JOIN 
				  		tbl_town 

				  On 
				  		tbl_town.townId = tbl_property.locationId 

 
				  INNER JOIN 
				  		tbl_type
				  		
				  ON 

				  	tbl_type.typeid = tbl_property.type"
				  		
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
	    
		echo "Price:$row[2] <br> Type: $row[3] <br> Location: $row[4] ";
		echo "</div>";
		echo "</div>";
}
}
	    ?>





	
	
	


</body>
</html>