<?php 

require('onfig.php');

//Check For Submit.

if(isset($_POST['submit'])){

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$mail = mysqli_real_escape_string($conn, $_POST['mail']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$query = "INSERT INTO able(name, mail, password) VALUES('$name', '$mail', '$password')";

	if(mysqli_query($conn, $query)){

             header("Location: " . ROOT_URL . '');


	}

	else{

		 echo "ERROR: ".mysqli_error($conn);
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD POST</title>
  <link rel="stylesheet" type="text/css" href="self2.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@900&display=swap" rel="stylesheet">  
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cosmo/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active mt-2 ml-4" id="home" aria-current="page" href="<?php echo ROOT_URL?>">Home</a>
        <a class="nav-link active mt-2 ml-4" id="addpost" href="<?php echo ROOT_URL?>">ADD POST</a>
        </div>
    </div>
  </div>
</nav>

<div class="container">
   <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <h1 class="text-center text-white" style="font-weight: bold;">ADD POST</h1>
   	<div class="form-group">
   	    <label>Name</label>
   	    <input type="text" name="name" class="form-control">
    </div>
   <div class="form-group">
   	    <label>E-MAIL</label>
   	    <input type="email" name="mail" class="form-control">
   </div>
   	<div class="form-group">
   	    <label>Password</label>
   	    <input type="password" name="password" class="form-control">
    </div>
    <div class="row">
       <div class="col-3"></div>
        <div class="col-3"></div>
         <div class="col-3"> <input id="btn_s" type="submit" name="submit" value="Submit"></div>
            <div class="col-3"></div>
    </div>
     </form>
 </div>  
</body>
</html>