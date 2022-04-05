<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fpdf_gen
 {
     public function __construct()
     {
         require_once APPPATH.'third_party/fpdf/fpdf.php';
         $pdf= new FPDF('P','mm',array(80,80));
         $pdf->AddPage();
         $CI=get_instance();
         $CI->fpdf=$pdf;         
     }



}
?>