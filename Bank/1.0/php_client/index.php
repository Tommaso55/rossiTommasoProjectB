<?php
	session_start();
	if(!isset($_SESSION['logged'])) 
        $_SESSION['logged'] = false;
	if(ISSET($_REQUEST['choice']))
		$ch=$_REQUEST['choice'];
	else
		$ch=null;
	require('../include/libUser.php');

	writeHeader();
	//$_SESSION['logged']=true;
	if($ch=="login"){
        $m=$_POST['mail'];
        $p=$_POST['password'];
        //echo($m.','.$p);
        $db=new mysqli($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME);
        $sql="SELECT * FROM customer WHERE email='$m' AND password='".md5($p)."'";
        $resultSet=$db->query($sql);
        $db->close();
        
        if($resultSet->num_rows == 1){
            echo('<div class="alert alert-success">Operation Confirmed.</div>');
            $record = $resultSet->fetch_assoc();
            $_SESSION['logged']=true;
            $_SESSION['idCustomer']=$record['id'];
			//echo('Id'.$_SESSION['idCustomer'].'');
        }
        else{
            echo('<div class="alert alert-warning">mmmm...there is something wrong. You should pay more attention when you type the keyboard...</div>');
        }    
       
    }
    /*if($_SESSION['logged']==true){
        //echo('Id'.$_SESSION['idCustomer'].'');
		writeMenu();
    }*/
    if($ch=="logout"){
        $_SESSION['logged']=false;
        session_destroy();
        //writeMenu();
    }
	writeMenu();
    echo('<br><div class="container text-center"><h1>ProjectB</h1><br><br><br><div class="d-flex justify-content-around"><div class="d-flex"><img src="../img/projectB.png" width="40%" ></div><br><div class="container"><h3>Why should you choose us?</h3><br><p>We are the best bank of the world</p></div></div></div>');
	writeFooter();

?>