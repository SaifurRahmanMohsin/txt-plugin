<?php namespace Mohsin\Txt\Models;

use Model;
use Mohsin\Txt\Models\Human;

/**
 * Human Model
 */
class Human extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsin_txt_humans';

    /**
     * @var array Relations
     */
    public $hasMany = [
        'information' => ['Mohsin\Txt\Models\Information', 'table' => 'mohsin_txt_information', 'order' => 'position asc']
    ];

    public function getAttributionOptions($fieldName = null, $keyValue = null)
    {
      $human_fields = explode(',', Setting::get('human_fields'));
      array_walk($human_fields, 'trim');
      $fields = array_combine($human_fields, $human_fields);
    	return $fields;
    }

    public function generateTxt()
    {
    	$humans = "";
    	foreach(Human::all() as $human)
    		{
    				$humans .= '/* ' . $human -> attribution . ' */' . PHP_EOL;
    				foreach($human -> information as $information)
    					$humans .= $information -> field . ': ' .$information -> value . PHP_EOL;
    				$humans .= PHP_EOL;
    		}
    	return $humans;
    }

}