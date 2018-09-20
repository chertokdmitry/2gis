<?php

class Json
{
    public function makeJson($array, $many = false)
    {
        $data = $many ? '{"' . App::gi()->uri->table . '":' : '';
        
        foreach($array as $key => $value) {
            $response[$key]= $value;
        }
        
        $data .= json_encode($response, JSON_UNESCAPED_UNICODE);
        $data .= $many ? '}' : '';

	return $data;
    }
    
    public function makeQuery() 
    {        
        $table1 = App::gi()->uri->table;
        $table2 = App::gi()->uri->filter;
        $filterTable = $table1 . "_" . $table2;
        $where = $table2 . ".id=" . $filterTable . "." . $table2 ."_id";
        $whereFilter = $filterTable . "." . $table1 . "_id=" . App::gi()->uri->id;    
        
        $query = "SELECT * FROM " . $table2 . ", " .  $filterTable .
                " WHERE " . $where . " AND " . $whereFilter;   

        return $query;
    } 
}
