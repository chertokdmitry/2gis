<?php

class Search 
{
    public function searchItems($str) 
    {
        $searchString = '%' . $str . '%';
        $items = \R::find('firm', ' name LIKE ? ', [$searchString]);
        $items = shift($items);
        
        $json = new Json;
        return $json->makeJson($items, true);
    }    
    
    public function searchFirmCategory($str) 
    {
        $searchString = '%' . $str . '%';
        $items = \R::find('category', ' name LIKE ? ', [$searchString]);
        $items = shift($items);
        $categories = $this->searchChild($items[0]['id'],  $items);
        
        $json = new Json;
        
        return $json->makeJson($this->searchFirms($categories), true);
    }    
    
    private function searchFirms($categories)
    {
        $accFirms = [];
        foreach($categories as $category) {
            
            $query = "SELECT * FROM category_firm, firm "
                    . "WHERE category_firm.category_id = " . $category['id']
                    . " AND firm.id = category_firm.firm_id";   
            
            $firms = \R::getAll($query);
            $firms =  shift($firms);
            $accFirms = array_merge($accFirms, $firms);
        }
        
        return $accFirms;
    }
    
    private function searchChild($parentId, $acc)
    {   
        $itemChild = \R::find( 'category', ' parent_id = ? ', [$parentId]);
        
        $items = shift($itemChild);
        $acc = array_merge($acc, $items);
         
        if(isset($itemChild[0]['id'])) {
            $this->searchChild($itemsChild[0]['id'], $acc);       
         } 
         return $acc;
    }
}
