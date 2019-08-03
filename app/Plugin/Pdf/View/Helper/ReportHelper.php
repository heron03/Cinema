<?php 
App::uses('AppHelper', 'View/Helper');

class ReportHelper extends AppHelper {
    
    public function __construct(View $view, $settings = array()) {
        $this->Pdf = new PdfReport();
        parent::__construct($view, $settings);
    }
     
    public function create($settings){
        return $this->Pdf->create($settings);
    }    
        
}