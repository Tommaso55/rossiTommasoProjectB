<?php
	session_start();
	if(!isset($_SESSION['log'])) 
        $_SESSION['log'] = false;
	if(ISSET($_REQUEST['choic']))
		$ch=$_REQUEST['choic'];
	else
		$ch=null;
	require('../include/libAdmin.php');

	writeHeader();
	if($ch=="login"){
        $m=$_REQUEST['mail'];
        $p=$_REQUEST['password'];
        $db=new mysqli($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME);
        $sql="SELECT * FROM admin WHERE email='$m' AND password='".md5($p)."'";
        $resultSet=$db->query($sql);
        $db->close();
        
        if($resultSet->num_rows == 1){
            echo('<div class="alert alert-success">Operation Confirmed.</div>');
            $record = $resultSet->fetch_assoc();
            $_SESSION['log']=true;
            $_SESSION['idAdmin']=$record['id'];
        }
        else{
            echo('<div class="alert alert-warning">mmmm...there is something wrong. You should pay more attention when you type the keyboard...</div>');
        }    
       
    }
    if($ch=="logout"){
        $_SESSION['log']=false;
        session_destroy();
    }
    if($_SESSION['log'] == true){
        writeMenu();
    }
    else{
        echo('<br>
        <div class="container">
            <h1>Sign In</h1><br>
            <form action="index.php">
                    <div class="mb-3">
                        <label for="inputMail" class="form-label">E-mail:</label>
                        <input type="text" name="mail" class="form-control form-control-sm" id="inputMail" aria-describedby="mailHelp">
                        <label for="inputPassword" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control form-control-sm" id="inputPassword" aria-describedby="passwordHelp">
                    </div>
                        <input type="hidden" name="choic" value="login">
                        <button type="submit" class="btn btn-primary">Login</button>
                </form>   
            
        </div>
            ');
    }
	writeFooter();

?>