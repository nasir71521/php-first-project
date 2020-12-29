<?php 
require('onfig.php');

//Create the Query

$query = "SELECT * FROM able";

//Get the Query.

$result = mysqli_query($conn, $query);

//Fetch the Query.

$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Free the Result.

mysqli_free_result($result);

//Close the Query.

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Project One</title>
	<!-- CSS only -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cosmo/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="<?php echo ROOT_URL;?>">Home</a>
        <a class="nav-link" href="<?php echo ROOT_URL;?>add.php">ADD POST</a>
        </div>
    </div>
  </div>
</nav>

<div class="container">
	 <div class="row">
	 	 <div class="col-2"><h5>ID</h5></div>
	 	 <div  class="col-2"><h5>Name</h5></div>
	 	 <div class="col-2"><h5>Email</h5></div>
	 	 <div class="col-2"><h5>Password</h5></div>
	 	 <div class="col-2"><h5>INSERT</h5></div>
	 </div>
</div>
<div class="container">
<?php foreach ($posts as $post):?>	
	 <div class="row">
	 	 <div class="col-2"><?php echo $post['id']?></div>
	 	 <div class="col-2"><?php echo $post['name']?></div>
	 	 <div class="col-2"><?php echo $post['email']?></div>
         <div class="col-2"><?php echo $post['password']?></div>
         <div class="col-2"><a href="<?php echo ROOT_URL?>post.php?id=<?php echo $post['id'];?>">READ-MORE</a></div>
   	 </div>
<?php endforeach;?>	 
</div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>