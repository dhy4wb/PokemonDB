<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="/">PokemonFinder</a>
				</div>
				
				<ul class="nav navbar-nav">
					<li><a href="/">Home</a></li>
					<li><a href="">Simple</a></li>
					<li><a href="">Pokedex</a></li>
					<li><a href="/simpleform">Simple</a></li>
				</ul>



				<form class="navbar-form navbar-left" action="/search_result" method="get">
					<div class = "input-group">
						<input type="text" name="search_term" class="form-control" placeholder="Search Pokemon">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
					</div>
				</form>



				<ul class="nav navbar-nav navbar-right">
					<?php
					if(isset($_SESSION["username"])){
						echo '<li><a href="/profile"><span class="glyphicon glyphicon-user"></span> Profile </a></li>';
					}
					else {
						echo '<li><a href="/login"><span class="glyphicon glyphicon-user"></span> Profile </a></li>';
					}
					?>
				</ul>

			</div>
		</nav>
	</body>

</html>
