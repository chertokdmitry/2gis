<?php

class LocationController extends Controller 
{
    public function index()
    {
        $this->model = new Location;
        return $this->model->locateItems();
    }
}

