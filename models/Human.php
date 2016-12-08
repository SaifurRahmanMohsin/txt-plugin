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
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * @var array Relations
     */
    public $hasMany = [
        'information' => ['Mohsin\Txt\Models\Information', 'table' => 'mohsin_txt_information', 'order' => 'position asc']
    ];

    public function getAttributionOptions($fieldName = null, $keyValue = null)
    {
      $human_fields = Setting::get('human_fields');
      array_walk($human_fields, function(&$value, $key) {
          $value = $value['human_field'];
      });
      foreach($human_fields as $key => $val) $fields[$val]=$val;
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
