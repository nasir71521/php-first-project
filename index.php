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
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(112, 48, 111, .9);">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active text-white" aria-current="page" href="<?php echo ROOT_URL;?>">Home</a>
        <a class="nav-link text-white" href="<?php echo ROOT_URL?>add.php">ADD POST</a>
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
  	<?php foreach($posts as $post): ?>
    <tr>
      <th scope="row"><?php echo $post['id']?></th>
      <td><?php echo $post['name']?></td>
      <td><?php echo $post['password'];?></td>
      <td><?php echo $post['mail']?></td>
      <td><a  class="btn btn-primary btn-sm" href="<?php echo ROOT_URL;?>add.php">add post</a></td>
      <td><a  href="<?php echo ROOT_URL?>post.php?id=<?php echo $post['id'];?>" class="btn btn-primary btn-sm">READ-MORE</a></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>