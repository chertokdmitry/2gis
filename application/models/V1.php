<?php

class V1 
{
    public function getItem()
    {
	header("HTTP/1.1 200");
	$item = \R::findOne(App::gi()->uri->table, ' id = ?', [App::gi()->uri->id]); 

	return $this->makeJson($item);
    }
    
    public function getAll($filter = false)
    {
        header("HTTP/1.1 200");
        $data = '';
        $response = [];
        
        if($filter) {
        
        $table = App::gi()->uri->table;
        $filterTable = $table . "_" . App::gi()->uri->filter;
        $where = $table . ".id=" . $filterTable . "." . $table ."_id";
        $whereFilter = $filterTable . "." . App::gi()->uri->filter . "_id=" . App::gi()->uri->id;    
        
        $query = "SELECT * FROM " . $table . ", " .  $filterTable .
                " WHERE " . $where . " AND " . $whereFilter;
        
        $items = \R::getAll($query);
        
        } else {
             $items = \R::findAll(App::gi()->uri->table); 
        }
        
        $data .= '{"' . App::gi()->uri->table . '":[';
        $data .= $this->makeJson($items);
        $data .= ']}';
        
        return $data;
    }
    
    private function makeJson($array)
    {
        foreach($array as $key => $value) {
            $response[$key]= $value;
        }
	return json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}

//v1/firm                         Список всех фирм
//v1/firm/1                       Фирма с id=1 
//v1/firm/1?expand=categories     Фирмы categories = 1
//v1/firm/2?expand=phone          Фирмы phone = 2

//v1/building                     Список всех зданий
//v1/building/1                   Здание с id=1
//v1/building/1?expand=firms      Все фирмы в здании