<?php
    session_start();
    require('../include/libUser.php');

    writeHeader();

    if(!isset($_SESSION['logged'])) 
        $_SESSION['logged'] = false;
    if(isset($_REQUEST['choice']))
        $ch=$_REQUEST['choice'];
    else
        $ch=null;
    if($_SESSION['logged']==false){
       if($ch=="login"){
        echo('<br>
        <div class="container">
            <h1>Sign In</h1><br>
            <form action="index.php" method="post">
                    <div class="mb-3">
                        <label for="inputMail" class="form-label">E-mail:</label>
                        <input type="text" name="mail" class="form-control form-control-sm" id="inputMail" aria-describedby="mailHelp">
                        <label for="inputPassword" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control form-control-sm" id="inputPassword" aria-describedby="passwordHelp">
                    </div>
                        <input type="hidden" name="choice" value="login">
                        <button type="submit" class="btn btn-primary">Login</button>
                        
                        <a href="login.php?choice=signUp" class="btn btn-primary">Sign Up</a>
                </form>   
            
        </div>
            ');
        
            
       
    }
    if($ch=="signUp"){
        
        echo('<br>
        <div class="container">
        <h1>Sign Up</h1><br>
        <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control form-control-sm" id="inputName" aria-describedby="nameHelp">
                    <label for="inputCognome" class="form-label">Surname:</label>
                    <input type="text" name="surname" class="form-control form-control-sm" id="inputSurname" aria-describedby="surnameHelp">
                    <label for="inputDate" class="form-label">Date Of Birth:</label>
                    <input type="date" name="date" class="form-control form-control-sm" id="inputDate" aria-describedby="dateHelp">
                    <label for="inputAddress" class="form-label">Address:</label>
                    <input type="text" name="address" class="form-control form-control-sm" id="inputAddress" aria-describedby="addressHelp">
                    <label for="inputMail" class="form-label">E-mail:</label>
                    <input type="text" name="mail" class="form-control form-control-sm" id="inputMail" aria-describedby="mailHelp">
                    <label for="inputPassword" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control form-control-sm" id="inputPassword" aria-describedby="passwordHelp">
                </div>    
                    <input type="hidden" name="choice" value="addCustomer">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                
                </form>
           </div> 
                ');
    }
    if($ch=="addCustomer"){
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $date=$_POST['date'];
        $address=$_POST['address'];
        $mail=$_POST['mail'];
        $password=$_POST['password'];
        //echo($name.''.$surname.''.$date.''.$address.''.$mail.''.$password);
        $db=new mysqli($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME);
        $sql="INSERT INTO customer(name,surname,dateOfBirth,address,email,password) VALUES('$name','$surname','$date','$address','$mail','".md5($password)."')";
        if($db->query($sql)){
            echo('<div class="alert alert-success">Operation Confirmed.</div>');
        }
        else{
            echo('<div class="alert alert-warning">mmmm...there is something wrong. You should pay more attention when you type the keyboard...</div>');
        }
        //$db->query($sql);
        $sql="SELECT c.id from customer as c WHERE email='$mail' AND password='".md5($password)."'";
        $resultSet=$db->query($sql);
        $record=$resultSet->fetch_assoc();
        $idCustomer=$record['id'];
        $sql="INSERT INTO account(idCustomer,wallet) VALUES('$idCustomer',0)"; 
        $db->query($sql);
        $db->close();
        writeMenu();
    } 
}
else
    writeMenu();
    
    
   

    
    
    writeFooter();
?>