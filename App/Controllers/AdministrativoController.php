<?php

class AdministrativoController extends Controller {
    public function __construct(){
        
    }

    public function index () 
    {
        $this->prepareView("Administrativo/index.php");
    }
}