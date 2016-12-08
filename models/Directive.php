<?php namespace Mohsin\Txt\Models;

use Model;

/**
 * Directive Model
 */
class Directive extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsin_txt_directives';

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'type',
        'data'
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'robot' => ['Mohsin\txt\Models\Robot',
        'table' => 'mohsin_txt_robots']
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'type' => 'required',
        'data' => 'required'
    ];

    public $customMessages = [
        'type.required' => 'Please select a directive type.',
        'data.required' => 'Data cannot be empty.'
    ];

    public function getTypeOptions($fieldName = null, $keyValue = null)
    {
        return [
            'Allow' 	 => 'Allow',
            'Disallow' => 'Disallow',
            'Host' 		 => 'Host',
            'Sitemap'  => 'Sitemap'
        ];
    }
}
