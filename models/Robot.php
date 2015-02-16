<?php namespace Mohsin\Txt\Models;

use Model;
use Mohsin\Txt\Models\Agent;

/**
 * Robot Model
 */
class Robot extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsin_txt_robots';

    /**
     * @var array Relations
     */
    public $hasMany = [
        'directives' => ['Mohsin\Txt\Models\Directive', 'table' => 'mohsin_txt_directive', 'order' => 'position asc']
    ];

    public function getAgentOptions($fieldName = null, $keyValue = null)
    {
    	return Agent::lists('comment','name');
    }

    public function generateTxt()
    {
    	$robots = "";
    	foreach(Robot::all() as $robot)
    		{
    				$robots .= 'User-agent: ' . $robot -> agent . PHP_EOL;
    				foreach($robot -> directives as $directive)
    					$robots .= $directive -> type . ': ' .$directive -> data . PHP_EOL;
    				$robots .= PHP_EOL;
    		}
    	return $robots;
    }
}