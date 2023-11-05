<?php

class SiteController extends Controller{
    public function index ($params = "home") 
    {
        $this->prepareSite('index',$params);
    }

    public function vacinas ($params = "vacinas") 
    {
        $this->prepareSite('index',$params);
    }

    public function consultas ($params = "consultas") 
    {
        $this->prepareSite('index',$params);
    }

    public function gestante ($params = "gestante") 
    {
        $this->prepareSite('index',$params);
    }

    public function dentista ($params = "dentista") 
    {
        $this->prepareSite('index',$params);
    }

    public function sobre ($params = "sobre") 
    {
        $this->prepareSite('index',$params);
    }

    public function contato ($params = "contato") 
    {
        $this->prepareSite('index',$params);
    }
}