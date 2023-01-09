<?php
class Mankement extends Controller {
    private $mankementModel;
    public function __construct()
    {
        $this->mankementModel = $this->model('Mankementen');
    }
    public function index()
    {
        $data=[ 
            'title' => "Overzicht Mankemenden",
            
        ];
        $this->view('mankement/index', $data);
    }
}