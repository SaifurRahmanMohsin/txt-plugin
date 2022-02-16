<?php namespace Mohsin\Txt\Models;

use Model;

/**
 * Directive Model
 */
class Directive extends Model
{
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'mohsin_txt_directives';

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var string Overrides the sort order field name
     */
    const SORT_ORDER = 'position';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'type' => 'required',
        'data' => 'required'
    ];

    /**
     * @var array Custom validation error messages.
     */
    public $customMessages = [
        'type.required' => 'Please select a directive type.',
        'data.required' => 'Data cannot be empty.'
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'robot' => [
            'Mohsin\txt\Models\Robot',
            'table' => 'mohsin_txt_robots'
        ]
    ];

    /**
     * @var string|null $fieldName The Field name
     * @var string|null $keyValue The key value
     * @return array The available type options
     */
    public function getTypeOptions($fieldName = null, $keyValue = null)
    {
        return [
            'Allow'    => 'Allow',
            'Disallow' => 'Disallow',
            'Host'     => 'Host',
            'Sitemap'  => 'Sitemap'
        ];
    }
}
