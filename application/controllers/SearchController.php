<?php

class SearchController extends Controller 
{
    public function index()
    {
        if(App::gi()->uri->table == 'category') {
            $this->model = new Search;
            return $this->model->searchFirmCategory($_POST['search_category']);
        }
        
        $this->model = new Search;
        return $this->model->searchItems($_POST['search_firm']);
    }
}