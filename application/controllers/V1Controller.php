<?php

class V1Controller extends Controller 
{
    public function index()
    {
        $this->model = new V1;
        
        if(App::gi()->uri->id && !App::gi()->uri->filter) {
            return $this->model->getItem();
        } else {
            return $this->model->getAll();
        }
    }
}
