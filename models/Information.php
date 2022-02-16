<?php namespace Mohsin\Txt\Models;

use Model;

/**
 * Information Model
 */
class Information extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'mohsin_txt_information';

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [
        'field',
        'value'
    ];

    /**
     * @var array rules for validation
     */
    public $rules = [
        'field' => 'required',
        'value' => 'required'
    ];

    /**
     * @var array hasOne and other relations
     */
    public $belongsTo = [
        'human' => [
            'Mohsin\txt\Models\Human',
            'table' => 'mohsin_txt_humans'
        ]
    ];
}
