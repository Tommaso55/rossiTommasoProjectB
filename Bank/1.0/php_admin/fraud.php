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
        
        $db=new mysqli($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME);
        $sql="UPDATE transaction SET fraud = 1 , typeFraud = 'MoneyLaundering' WHERE amount > 100 and typeTransaction ='Deposit'"; 

        $db->query($sql);
            $sql="SELECT id, idAccount, amount, timestamp, typeTransaction, locations, typeFraud FROM transaction where fraud = 1";
            $resultSet=$db->query($sql);
            echo('<div class="container">
            <h1>Fraud Transaction</h1>
            <br><table class="table table-striped table-hover ">
                    <caption>information about fraud transactions</caption>
                    <thead>
                        <tr>
                            <th scope="col">AccountID</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Type Of Transaction</th>
                            <th scope="col">Location</th>
                            <th scope="col">Type of fraud</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>          
                ');
                while($record=$resultSet->fetch_assoc()){
                    echo('<tr>
                        <td>'.$record['idAccount'].'</td>
                        <td>'.$record['amount'].'</td>
                        <td>'.$record['timestamp'].'</td>
                        <td>'.$record['typeTransaction'].'</td>
                        <td>'.$record['locations'].'</td>
                        <td>'.$record['typeFraud'].'</td>
                        <td><form action="fraud.php" method="get">
                            <select class="form-select" name="status">
                            <option value="Pending">Pending</option>
                            <option value="InProgress">In progress</option>
                            <option value="Resolved">Resolved</option>
                            </select>
                            <input type="hidden" name="idTransaction" value='.$record['id'].'> 
                            <input type="hidden" name="choic" value="updateStatus">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-outline-dark">Update</button>
                            </form>
                        </td>
                    </tr>
                        ');  
                    }
                    echo('
                    </tbody>
                    </table>
                    <br><a href="pdffraud.php?" target="new" class="btn btn-dark">Print PDF</a>');
                    if($ch == 'updateStatus'){
                        $idT=$_REQUEST['idTransaction'];
                        $status=$_REQUEST['status'];
                        $sql="UPDATE transaction SET status = '$status' WHERE id = '$idT'";
                        $db->query($sql);
                    }
                    $db->close();
                    }
                else{
                    echo('<a href="index.php?choic=login">Utente non loggato, eseguire il login</div>');
                }
                writeFooter();

        
        