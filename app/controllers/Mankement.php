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

        foreach ($result as $info) {
            $d = new DateTimeImmutable($info->DatumTijd, new DateTimeZone('Europe/Amsterdam'));
            $rows .= "<tr>
           <td>{$d->format('d-m-Y')}</td>
           <td>{$d->format('H:i')}</td>
           <td>$info->LENA</td>
           <td><a href='" . URLROOT ."/lessen/lesinfo/{$info->Id}'><img src='" . URLROOT . "/img/b_help.png' alt='Lesinfo'></a></td>
           <td><a href='" . URLROOT . "/lessen/topicslesson/{$info->Id}'><img src='" . URLROOT . "/img/b_ftext.png' alt='Onderwerp'></a></td>
       </tr>";
        }
        
        $data=[ 
            'title' => "Overzicht Mankementen",
            'rows' => $rows
        ];
        $this->view('mankement/index', $data);
    }
}