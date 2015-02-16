<?php namespace Mohsin\Txt\Models;

use Model;

/**
 * Agent Model
 */
class Agent extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsin_txt_agents';

     /**
     * Validation rules
     */
    public $rules = [
        'name' => 'required'
    ];

}