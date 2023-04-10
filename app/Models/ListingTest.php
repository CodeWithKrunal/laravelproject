<?php 
namespace App\Models;


class ListingTest {
    public static function all(){
        return [
            [
                'id' => 1,
                'title' => 'Krunal One',
                'description' => 'Loream ipsum description'
            ],
            [
                'id' => 1,
                'title' => 'Krunal One',
                'description' => 'Loream ipsum description'
            ]
            ];
    }

    public static function find($id){
        
        $listings = self::all();

        foreach($listings as $listing){
               if($listing['id'] == $id){
                    return $listing;
               } 
        }
    }
}

?>