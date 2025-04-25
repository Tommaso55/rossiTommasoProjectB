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
					<title>BACK-END Bank</title>
					<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
				</head>
				<body>
					<div class="container-fluid">
					
		');	
		return;
	}
	function writeMenu(){
        echo('<button class="btn btn-outline-dark" type="menu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Menu</button>
            <div class="container-fluid">
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Admin Section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <a class="nav-link active" aria-current="page" href="../php_admin/index.php">Home</a>
                        <a class="nav-link" href="../php_admin/allVisualizza.php?choic=customer">Show all customers</a>
                        <a class="nav-link" href="../php_admin/allVisualizza.php?choic=tran">Show all transactions</a>
                        <a class="nav-link" href="../php_admin/fraud.php">Fraud transactions</a>                        
                        <a class="nav-link" href="../php_admin/index.php?choic=logout">Logout</a>
                    </div>
                </div>
            </div>');
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
