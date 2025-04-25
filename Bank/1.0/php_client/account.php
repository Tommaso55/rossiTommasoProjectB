<?php
    session_start();
    require('../include/libUser.php');
    writeHeader();
    
    if(!isset($_SESSION['logged'])) 
        $_SESSION['logged'] = false;
    
    
    if($_SESSION['logged']==true){
        writeMenu();
        
        $db=new mysqli($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME);
        $idSession=$_SESSION['idCustomer'];
        $sql="SELECT c.name, c.surname, c.dateOfBirth, c.address, c.email, a.wallet FROM account as a, customer as c WHERE a.idCustomer=c.id and c.id='$idSession'";
        $resultSet=$db->query($sql);
        
        echo('<div class="container">
            <h1>Your Account</h1>
            <br><table class="table table-striped table-hover ">
                    <caption>Your information</caption>
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Wallet</th>
                        </tr>
                    </thead>
                    <tbody>          ');
        
        $record=$resultSet->fetch_assoc();
        echo('<tr>
            <td>'.$record['name'].'</td>
            <td>'.$record['surname'].'</td>
            <td>'.$record['dateOfBirth'].'</td>
            <td>'.$record['address'].'</td>
            <td>'.$record['email'].'</td>
            <td>'.$record['wallet'].'</td>
        </tr>
        </tbody>
        </table>
            ');  
        $sql="SELECT id FROM account WHERE idCustomer='$idSession'";
        $resultSet=$db->query($sql);
        $record=$resultSet->fetch_assoc();
        $idAccount=$record['id'];
        $sql="SELECT amount, timestamp, typeTransaction, locations FROM transaction WHERE idAccount='$idAccount'";
        $resultSet=$db->query($sql);
        echo('<div class="container">
            <h1>Transaction History</h1>
            <br><table class="table table-striped table-hover ">
                    <caption>Your information</caption>
                    <thead>
                        <tr>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Type Of Transaction</th>
                            <th scope="col">Location</th>
                        </tr>
                    </thead>
                    <tbody>          ');
        
        while($record=$resultSet->fetch_assoc()){
        echo('<tr>
            <td>'.$record['amount'].'</td>
            <td>'.$record['timestamp'].'</td>
            <td>'.$record['typeTransaction'].'</td>
            <td>'.$record['locations'].'</td>
        </tr>
            ');  
        }
        echo('
        </tbody>
        </table>
        <br><a href="printTransactions.php?idAccount='.$idAccount.'&idCustomer='.$idSession.'" target="new" class="btn btn-danger">Print To PDF</a>');
        $db->close();
    }
    else{
        echo('<a href="login.php?choice=login">Utente non loggato, eseguire il login</div>');
    }
    writeFooter();

   

?>