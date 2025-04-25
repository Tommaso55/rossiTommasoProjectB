<?php

function HeadFoot(){
    class PDF extends FPDF{
        function Header(){
          
          $this->SetFont('Arial','b',18);
          $this->SetX(80);
          $this->Cell(45,10,'ProjectB','LTR',1,'C');
          $this->Image('../img/projectB.png',159,7,27);
          $this->SetFont('Arial','',14);
          $this->SetX(80);
          $this->Cell(45,10,'Inder & Tom','LRB',1,'C');
          $this->SetX(80);
          $this->Ln(20);
        }
        FUNCTION Footer(){
          $this->SetXY(10,277);
          $this->SetFont('Arial','',12);
          $this->Cell(190,10,$this->PageNo(),'T',0,'C');    
        }
      }
}

?>