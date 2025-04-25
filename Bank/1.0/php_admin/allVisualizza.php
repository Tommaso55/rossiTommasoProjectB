<?php
    session_start();
    require('../include/libAdmin.php');
    writeHeader();
    
    if(!isset($_SESSION['log'])) 
        $_SESSION['log'] = false;
    
    
    if($_SESSION['log']==true){
        if(ISSET($_REQUEST['choic']))
		    $ch=$_REQUEST['choic'];
	    else
		    $ch=null;
        writeMenu();
        if($ch=="customer"){
            $db=new mysqli($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME);
            $sql="SELECT c.name, c.surname, c.dateOfBirth, c.address, c.email, a.wallet FROM account as a, customer as c WHERE a.idCustomer=c.id";
            $resultSet=$db->query($sql);
            echo('<div class="container">
                <h1>Info customer</h1>
                <br><table class="table table-striped table-hover ">
                        <caption>information about customers</caption>
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
                        <tbody>          
            ');
            while($record=$resultSet->fetch_assoc()){
                echo('
                    <tr>
                        <td>'.$record['name'].'</td>
                        <td>'.$record['surname'].'</td>
                        <td>'.$record['dateOfBirth'].'</td>
                        <td>'.$record['address'].'</td>
                        <td>'.$record['email'].'</td>
                        <td>'.$record['wallet'].'</td>
                    </tr>
                    
                ');
            }
            echo('
                </tbody>
                </table>
            '); 
            $db->close();
        }
        if($ch=="tran"){
            $db=new mysqli($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME);
            $sql="SELECT c.name, c.surname, t.idAccount, t.amount, t.timestamp, t.typeTransaction, t.locations FROM transaction as t, account as a,customer as c where t.idAccount =a.id and a.idCustomer = c.id ";
            $resultSet=$db->query($sql);
            echo('<div class="container">
            <h1>Transaction History</h1>
            <br><table class="table table-striped table-hover ">
                    <caption>information about transactions</caption>
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">AccountID</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Type Of Transaction</th>
                            <th scope="col">Location</th>
                        </tr>
                    </thead>
                    <tbody>          
                ');
        
        while($record=$resultSet->fetch_assoc()){
        echo('<tr>
            <td>'.$record['name'].'</td>
            <td>'.$record['surname'].'</td>
            <td>'.$record['idAccount'].'</td>
            <td>'.$record['amount'].'</td>
            <td>'.$record['timestamp'].'</td>
            <td>'.$record['typeTransaction'].'</td>
            <td>'.$record['locations'].'</td>
        </tr>
            ');  
        }
        echo('
        </tbody>
        </table>');
        $db->close();
        }
    }
    else{
        echo('<a href="index.php?choic=login">Utente non loggato, eseguire il login</div>');
    }
    writeFooter();

   

?>