<?php
require('../include/libAdmin.php');
require('../include/fpdf/fpdf.php');
require('../include/adminheadPdf.php');
$db=new mysqli($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME);
HeadFoot();
$mypdf=new PDF();
    $mypdf->AddPage();
    $mypdf->SetFont('Arial','b',14);

    //$sql="SELECT c.name, c.surname,t.amount, t.timestamp, t.typeTransaction, t.locations FROM transaction as t, customer as c WHERE t.idAccount='$idAccount' INNER JOIN account as a on c.id=a.idCustomer";
    $sql="SELECT t.idAccount, c.name, c.surname,t.amount, t.timestamp, t.typeTransaction, t.typeFraud, t.status FROM transaction as t,  account as a,customer as c where t.idAccount =a.id and a.idCustomer = c.id and fraud = 1";
    $resultSet=$db->query($sql);
    $mypdf->SetX(3);
    $mypdf->Cell(10,10,"ID",0,0);
    $mypdf->Cell(32,10,"Name",0,0);
    $mypdf->Cell(32,10,"Surname",0,0);
    $mypdf->Cell(25,10,"Amount",0,0);
    $mypdf->Cell(26,10,"Type",0,0);
    $mypdf->Cell(45,10,"Fraud Type",0,0);
    $mypdf->Cell(35,10,"Status",0,1);
    $cnt=$resultSet->num_rows;
    $mypdf->SetFont('Arial','',14);
    while($record=$resultSet->fetch_assoc()){
      $mypdf->SetX(3);
      $mypdf->Cell(10,10,$record['idAccount'],1,0);
      $mypdf->Cell(32,10,$record['name'],1,0);
      $mypdf->Cell(32,10,$record['surname'],1,0);
      $mypdf->Cell(25,10,$record['amount'],1,0);
      $mypdf->Cell(26,10,$record['typeTransaction'],1,0);
      $mypdf->Cell(45,10,$record['typeFraud'],1,0);
      $mypdf->Cell(35,10,$record['status'],1,1);
	}
  $mypdf->Ln();
  $mypdf->Cell(90,10,"Number of fraud found ".$cnt,0,1);
    $mypdf->Output();
    $db->close();
?>