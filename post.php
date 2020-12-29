<?php
require('onfig.php'); 

//Check For the Submit Delete.

if(isset($_POST['delete'])){

	$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);


	$query = "DELETE FROM able WHERE id = {$delete_id}";


	if(mysqli_query($conn, $query)){
           
           //

		header("Location:" . ROOT_URL. " ");

	}
	else{
		 echo "ERROR: " .mysqli_error($conn);
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
	<title>POST PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="index2.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cosmo/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(112, 48, 111, .9);">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color: white; font-size: 30px">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a style="color: white; font-size: 20px" class="nav-link active" aria-current="page" href="<?php echo ROOT_URL;?>">Home</a>
        <a style="color: white; font-size: 20px" class="nav-link" href="<?php echo ROOT_URL?>add.php">ADD POST</a>
        </div>
    </div>
  </div>
</nav>
	
<table class="container table table-dark table-stripped mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NAME</th>
      <th scope="col">E-MAIL</th>
      <th scope="col">PASSWORD</th>
      <th scope="col">ADD POST</th>
      <th scope="col">INSERT</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $post['id']?></th>
      <td><?php echo $post['name']?></td>
      <td><?php echo $post['password'];?></td>
      <td><?php echo $post['mail']?></td>
      <td><a class="btn btn-sm btn-primary " href="<?php echo ROOT_URL?>editpost.php?id=<?php echo $post['id'];?>">EDIT POST</a></td>
      <td>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
 	 	    <input type="hidden" name="delete_id" value="<?php echo $post['id'] ?>">
	 	    <input style="background: #1978e3; border: none; color: white;" type="submit" name="delete" value="Delete">
	         </form>

      </td>
    </tr>
    <a  href="<?php  echo ROOT_URL?>index.php" class="btn btn-info">Back</a>
  </tbody>
</table> 	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>