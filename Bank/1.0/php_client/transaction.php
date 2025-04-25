<?php
    session_start();
    require('../include/libUser.php');
    writeHeader();
    if(isset($_REQUEST['choice']))
        $ch=$_REQUEST['choice'];
    else
        $ch=null;
    if(!isset($_SESSION['logged'])) 
        $_SESSION['logged'] = false;

    if($_SESSION['logged']==true){
        writeMenu();
        echo('
            <form action="transaction.php" method="post">
            <div class="container">
                <br>
                <h1>Perform Your Transaction</h1><br>
                <div class="container-sm">
                    <label for="inputAmount" class="form-label">Amount:</label>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" name="amount" class="form-control form-control-sm" id="inputAmount" aria-describedby="amountHelp">
                    </div>
                    <div id="amountHelp" class="form-text">Insert the amount</div>
                </div>
                <br>
                <div class="container-sm">
                    <label for="inputTypeTransaction" class="form-label">Choose the type of Transaction:</label>
                    <select class="form-select" name="typeTransaction" aria-label="inputTypeTransaction">
                        <!--<option selected>Type of Transaction</option>-->
                        <option value="deposit">Deposit</option>
                        <option value="withdrawal">WithDrawal</option>
                    </select>
                </div>
                <br>
                <div class="container-sm">
                    <label for="inputLocation" class="form-label">Location:</label>
                    <div class="mb-3">
                        <input type="text" name="location" class="form-control form-control-sm" id="inputLocation" aria-describedby="locationHelp">
                    </div>
                    <div id="locationHelp" class="form-text">Insert the location</div>
                </div>
                <br>
                <input type="hidden" name="choice" value="addTransaction">
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
                
            </form>');


            if($ch=="addTransaction"){
                $amount=$_POST['amount'];
                $type=$_POST['typeTransaction'];
                $location=$_POST['location'];
                $idCustomer=$_SESSION['idCustomer'];
                //echo($amount.''.$type.''.$location);
                $db=new mysqli($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME);
                $sql="SELECT id FROM account WHERE idCustomer='$idCustomer'";
                $resultSet=$db->query($sql);
                $record=$resultSet->fetch_assoc();
                $idAccount=$record['id'];
                //echo($idAccount);
                $sql="INSERT INTO transaction(idAccount,amount, typeTransaction, locations) VALUES('$idAccount','$amount','$type','$location')";
                //$db->query($sql);
                if($db->query($sql)){
                    echo('<br><div class="container"><div class="alert alert-success">Operation Confirmed.</div></div>');
                }
                else{
                    echo('<br><div class="container"><div class="alert alert-warning">mmmm...there is something wrong. You should pay more attention when you type the keyboard...</div></div>');
                }

                if($type=="deposit")
                    $sql="UPDATE account SET wallet=wallet+'$amount' WHERE id='$idAccount'";
                else
                    $sql="UPDATE account SET wallet=wallet-'$amount' WHERE id='$idAccount'";
                $db->query($sql);
                $db->close();
            }
    }
    else{
        echo('<a href="login.php?choice=login">Utente non loggato, eseguire il login</div>');
    }
    writeFooter();



?>