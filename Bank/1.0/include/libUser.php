<?php
	$DBHOST="localhost";
	$DBUSER="root";
	$DBPASSWORD="root";
	$DBNAME="bank";
	
	function writeHeader(){
		echo('
			<!DOCTYPE HTML>
			<html>
				<head>
					<meta charset="UTF-8">
					<title>FRONT-END Bank</title>
					<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
				</head>
				<body>
					<div class="container-fluid">
					
		');	
	
		return;
		
	}
	function writeMenu(){
		echo('<nav class="navbar navbar-expand-lg bg-body-tertiary">
		  <div class="container-fluid">
			<a class="navbar-brand" href="../php_client/index.php"><img src="../img/projectB.png" width="70px"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar">
			  <ul class="navbar-nav">
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="../php_client/index.php">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="../php_client/account.php">Account</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="../php_client/transaction.php">Transaction</a>
				</li>
			  </ul>
			</div>
			<ul class="nav justify-content-end">
				<li class="nav-item"><a class="navbar-brand" href="login.php?choice=login" >Login</a></li>
		  		<li class="nav-item"><a class="navbar-brand" href="index.php?choice=logout">Logout</a></li>
			</ul>
			</div>
		</nav>
		');
		return;
	}
	function writeFooter(){
    echo('</div>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
                </body>
            </html>');
    return;
}

?>