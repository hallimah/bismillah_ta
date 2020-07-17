<?php
class M_Maps extends CI_Model {
    /**
    * @var string The name of the clients table
    */
        protected $table = 'tb_penduduk';
    
      // Get all the countries from the media table

            public function get_map_country() {
                return $this->db
                    ->select("geo_country.country, COUNT( * ) as mediahits", false)
                    ->join('news_item_country', 'news_item_country.id=news_items.country') 
                    ->join('geo_country', 'geo_country.id=news_item_country.country') 
                    ->where('news_items.deleted', '0')
                    ->group_by('geo_country.country')
                    ->get('news_items')
                    ->result_array();
            }
    }
    ?>