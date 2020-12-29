<?php 

require('onfig.php');

//Check For Submit

if(isset($_POST['submit'])){

	$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);

	    $name = mysqli_real_escape_string($conn, $_POST['name']);

	         $mail = mysqli_real_escape_string($conn, $_POST['mail']);

	              $password = mysqli_real_escape_string($conn, $_POST['password']);

        
        $query  = "UPDATE able SET  
             
             name = '$name',
             mail = '$mail',
             password = '$password'

             WHERE id = {$update_id}";

             if(mysqli_query($conn, $query)){
                    
                    header("Location:" .ROOT_URL. '');

             }
             else{
                   
                   echo "ERROR: ".mysqli_error($conn);

             }

}


//WE NEED GO BACK BUTTON
$id = mysqli_real_escape_string($conn, $_GET['id']);

//Create the Query

$query = "SELECT * FROM able WHERE id = ".$id;

//Get the Query.

$result = mysqli_query($conn, $query);

//Fetch the Query.

$post = mysqli_fetch_assoc($result);

//Free the Result.

mysqli_free_result($result);

//Close the Query.

mysqli_close($conn);


?>


<!DOCTYPE html>
<html>
<head>
	<title>Project One</title>
    <link rel="stylesheet" type="text/css" href="back.css">

	<!-- CSS only -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cosmo/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #0b2eb5">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-size: 40px;">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a id="hov" style="font-size: 26px" class="nav-link active mt-2 ml-4" aria-current="page" href="<?php echo ROOT_URL;?>">Home</a>
        <a id="hover" style="font-size: 23px; margin-top: 10px;" class="nav-link active ml-4" href="<?php echo ROOT_URL;?>add.php">ADD POST</a>
        </div>
    </div>
  </div>
</nav>

<!-- <div class="container" id="container" style=" background-color: rgba(64, 113, 237, .7);">
 -->
<div class="container mt-4" id="container" style=" background-color: rgba(0, 0, 0, .5);">
    <h1 class="text-center text-white">EDIT POST</h1>

 <form  method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
	  
<div class="form-group">
	  <label class="text-white mt-2">Name</label>
     	  <input style="border-radius: 10rem; border: none;" type="text" name="name" class="form-control" value="<?php echo $post['name'];?>">
 </div>

 <div class="form-group">
	  <label class="text-white">E-MAIL</label>
     	  <input style="border-radius: 10rem; border: none;"  type="email" name="mail" class="form-control" value="<?php echo $post['mail']?>">
 </div>

 <div class="form-group">
	  <label class="text-white">Password</label>
     	  <input style="border-radius: 10rem; border: none;"  type="password" name="password" class="form-control" value="<?php echo $post['password'];?>">
 </div>

        <input type="hidden" name="update_id" value="<?php echo $post['id']?> ">

          <div class="row">
               <div class="col-3"></div>

               <div class="col-3"></div>
           <div class="col-3"><input id="button" type="submit" name="submit" value="Submit" class="btn btn-lg btn-info mb-4"></div>
               <div class="col-3"></div>
          </div>
        	   

</form>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>