<!DOCTYPE html>
<html>
<head>
	<title>Update</title>

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
	        <li><a href="aboutus.html">About US</a></li>
	        <li><a href="contactus.php">Contact Us</a></li>
	        <li><a href="property.php">Propertys</a></li>
	        <li><a href="insertproperty.php">Insert</a></li>
	        <li><a href="logout.php">Log Out</a></li>

	      </ul>
	      
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

<?php


$id = $_POST['edit'];


require_once'Models/MySQLConnection.php';

$conn = ConnectToMySQL();


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



				  WHERE propertyId = '$id' "


				  		
				  ;


				 $result = mysqli_query($conn, $query)
		or die("Error in query: ". mysqli_error($conn));

		while ($row = mysqli_fetch_row($result)){

			$id = $row[0];



?>


<form action="update.php" method="post">
	
<lable> Price </lable>

<?php
echo "<input type='number' name='price' value ='$row[2]' >";




?>


<br>

<label>Town</label>

<?php
 echo "<input type='text' name='town' value= '$row[3]'>";

?>


<br>


<label>type</label>
<?php
 echo "<input type='text' name='type' value = '$row[4]'>";

}

?>

<input type="submit" name="submit" value="submit">

</form>


<?php

if(isset($_POST['submit'])){

  $price = $_POST['price'];
  $type = $_POST['type'];
  $town = $_POST['town'];

require_once'Models/MySQLConnection.php';

$conn = ConnectToMySQL();

		$query = "UPDATE tbl_property SET price='$price',  WHERE id=2";
}

?>

</body>
</html>