<?php

$id = $_POST['delete'];

require_once'Models/MySQLConnection.php';

$conn = ConnectToMySQL();


		$query = "DELETE FROM tbl_property WHERE propertyId = '$id'";

		$file = "images/propertys/$id.jpg";
		if (!unlink($file))
  	{
  	echo ("Error deleting $file");
  }
	else
  {
  echo ("Deleted $file");
  }

		if (mysqli_query($conn, $query)) {
    		echo "Record deleted successfully";
			} else {
    echo "Error deleting record: " . mysqli_error($conn);
}		

?>