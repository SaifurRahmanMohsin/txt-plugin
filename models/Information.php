<?php namespace Mohsin\Txt\Models;

use Model;

/**
 * Information Model
 */
class Information extends Model
{
		use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsin_txt_information';

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'field',
        'value'
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'field' => 'required',
        'value' => 'required'
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'human' => ['Mohsin\txt\Models\Human', 'table' => 'mohsin_txt_humans']
    ];
}
