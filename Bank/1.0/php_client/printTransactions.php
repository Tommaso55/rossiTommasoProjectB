<?php
require('../include/libUser.php');
require('../include/fpdf/fpdf.php');
require('../include/HeadFootPDF.php');
$db=new mysqli($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME);
$idAccount=$_REQUEST['idAccount'];
$idCustomer=$_REQUEST['idCustomer'];
HeadFoot();
$mypdf=new PDF();
    $mypdf->AddPage();
    $mypdf->SetFont('Arial','b',14);

    //$sql="SELECT c.name, c.surname,t.amount, t.timestamp, t.typeTransaction, t.locations FROM transaction as t, customer as c WHERE t.idAccount='$idAccount' INNER JOIN account as a on c.id=a.idCustomer";
    $sql="SELECT c.name, c.surname,t.amount, t.timestamp, t.typeTransaction, t.locations FROM transaction as t, customer as c WHERE t.idAccount='$idAccount' AND c.id='$idCustomer'";
    $resultSet=$db->query($sql);
    $mypdf->SetX(3);
    $mypdf->Cell(32,10,"Name",0,0);
    $mypdf->Cell(32,10,"Surname",0,0);
    $mypdf->Cell(25,10,"Amount",0,0);
    $mypdf->Cell(48,10,"Date",0,0);
    $mypdf->Cell(26,10,"Type",0,0);
    $mypdf->Cell(41,10,"Location",0,1);
    $cnt=$resultSet->num_rows;
    $mypdf->SetFont('Arial','',14);
    while($record=$resultSet->fetch_assoc()){
      $mypdf->SetX(3);
      $mypdf->Cell(32,10,$record['name'],1,0);
      $mypdf->Cell(32,10,$record['surname'],1,0);
      $mypdf->Cell(25,10,$record['amount'],1,0);
      $mypdf->Cell(48,10,$record['timestamp'],1,0);
      $mypdf->Cell(26,10,$record['typeTransaction'],1,0);
      $mypdf->Cell(41,10,$record['locations'],1,1);
	}
  $mypdf->Ln();
  $mypdf->Cell(90,10,"Amount of transactions performed: ".$cnt,0,1);
    $mypdf->Output();
    $db->close();
?>