<?php

class V1
{
    public function getItem()
    {
	header("HTTP/1.1 200");
	$item = \R::findOne(App::gi()->uri->table, ' id = ?', [App::gi()->uri->id]); 
        $json = new Json;
        
	return $json->makeJson($item);
    }
         
    public function getAll()
    {
        header("HTTP/1.1 200");
        
        if(App::gi()->uri->filter) {
            $items = \R::getAll($this->makeQuery());
        } else {
            
             $items = \R::find(App::gi()->uri->table); 
             $items = shift($items);
        }
        $json = new Json;
        
        return $json->makeJson($items, true);
    }  
}

