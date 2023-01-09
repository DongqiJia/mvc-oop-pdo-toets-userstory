<?php
class Mankement extends Controller {
    private $mankementModel;
    public function __construct()
    {
        $this->mankementModel = $this->model('Mankementen');
    }
    public function index()
    {
        $result = $this->mankementModel->getMankement();
        $rows = '';

        foreach ($result as $mankement) {
            $rows .= "<tr>
           <td>$mankement->Datum</td>
           <td>$mankement->Mankement</td>
       </tr>";
        }

        $data=[ 
            'title' => "Overzicht Mankementen",
            'Email' => "manhoi@gmail.com",
            'Kenteken'=> "TH-78-KL --- Ferrari",
            'rows' => $rows
        ];
        $this->view('mankement/index', $data);
    }
    public function addMankement()
    {
        $data = [
            'title' => 'Invoeren Mankement',
            'Kenteken' => "TH-78-KL --- Ferari" ,
        ];
        $this->view('mankement/addmankement', $data);
    }
}