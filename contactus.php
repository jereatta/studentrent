	<!DOCTYPE html>
	<html>
	<head>
		<title>Contact us</title>

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

		<h1>Contact us</h1>

		<form  method="post" action="contactus.php" >
			
			<label>Email</label>
			<input type="text" name="email" required>
			<br>
			<label>Mobile number</label>
			<input type="number" name="number" required>
			<br>
			<textarea name="comments" required></textarea>

			<button name="submit" type="submit"> submit</button>


		</form>

		<?php



		function writeToFile($trueemail,$truenumber,$massage)	
		{

				$myfile = fopen("contectus.txt", "w") or die("Unable to open file!");
				fwrite($myfile, $trueemail . PHP_EOL);
				fwrite($myfile, $truenumber . PHP_EOL);
				fwrite($myfile, $massage . PHP_EOL);
				fclose($myfile);
		}

				if(isset($_POST['submit'])){
			$number = $_POST["number"];
			$email = $_POST["email"];

			$trueemail = false;
			

			$massage = $_POST["comments"];

			
			if(isset($number)){



				if (strlen($number) == 8) {
					
					$truenumber = true;
				}else{

					echo "Input your mobile number";

				}
			}	

			
			if(isset($email)){
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    		echo "<br>";
	    		echo "Enter a valid email";
			}else{
				$trueemail = true;
			}
		}

		if($trueemail == true && $truenumber == true){
		writeToFile($email,$number,$massage);
}

		
	}
	
			
	  

		?>

	</body>
	</html>