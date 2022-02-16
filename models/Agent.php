<?php namespace Mohsin\Txt\Models;

use Model;

/**
 * Agent Model
 */
class Agent extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'mohsin_txt_agents';

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [
        'name',
        'comment'
    ];

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name' => 'required'
    ];
}
