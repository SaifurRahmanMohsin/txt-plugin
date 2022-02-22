<?php namespace Mohsin\Txt\Models;

use Model;

/**
 * Directive Model
 */
class Directive extends Child
{
    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string Overrides the sort order field name
     */
    const SORT_ORDER = 'position';

    /**
     * @var array Custom validation error messages.
     */
    public $customMessages = [
        'field.required' => 'Please select a directive type.',
        'value.required' => 'Data cannot be empty.'
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'robot' => [
            \Mohsin\txt\Models\Robot::class,
            'table' => 'mohsin_txt_parents'
        ]
    ];

    /**
     * Override the boot method to limit this model to robot
     * txts in the parent model.
     */
    protected static function boot()
    {
        static::addGlobalScope('directive', function ($builder) {
            $builder->where('is_robot', 1);
        });
        parent::boot();
    }

    /**
     * Overloads the type attribute to use the child equivalent.
     *
     * @return string
     */
    public function getTypeAttribute()
    {
        return $this->field;
    }

    /**
     * Overloads the type attribute to use the child equivalent.
     *
     * @return string
     */
    public function setTypeAttribute($value)
    {
        $this->field = $value;
    }

    /**
     * Overloads the data attribute to use the child equivalent.
     *
     * @return string
     */
    public function getDataAttribute()
    {
        return $this->value;
    }

    /**
     * Overloads the data attribute to use the child equivalent.
     *
     * @return string
     */
    public function setDataAttribute($value)
    {
        $this->value = $value;
    }

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
