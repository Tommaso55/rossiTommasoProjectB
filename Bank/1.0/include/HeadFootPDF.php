<?php

function HeadFoot(){
    class PDF extends FPDF{
        function Header(){
          
          $this->SetFont('Arial','b',18);
          $this->SetX(70);
          $this->Cell(60,10,'ProjectB','LTR',1,'C');
          //$this->SetX(80);
          $this->Image('../img/projectB.png',145,5,40);
          $this->SetFont('Arial','',14);
          $this->SetX(70);
          $this->Cell(60,10,'Inder & Tom','LR',1,'C');
          $this->SetX(70);
          $this->SetFont('Arial','',12);
          $this->Cell(60,10,'Your Information','LBR',0,'C');
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