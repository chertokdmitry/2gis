<?php

class Location
{ 
    public function locateItems()
    {
        $items = $this->checkLocation();
        $json = new Json;
	return $json->makeJson($items, true);
    }
    
    private function checkLocation() 
    {
        $point = explode("_", App::gi()->uri->id);
        $my_lat =  $point[0];
        $my_lon = $point[1];
        $items = [];
        $allitems = [];
        $locations = \R::findAll('building_location'); 

        foreach ($locations as $location) {
            $distance = $this->haversine($my_lat, $my_lon, $location['geo_lat'], $location['geo_lon']);
                      
            if($distance < 700) {
                $items = \R::find(App::gi()->uri->table, ' building_id = ?', [$location['building_id']]); 
                $allitems = array_merge($allitems, $items);
            }
        }
        return  $allitems;
    }
    
    private function haversine($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $earthRadius = 6371000;
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        
        return $angle * $earthRadius / 1000;
    }
}
