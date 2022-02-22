<?php namespace Mohsin\Txt\Models;

use Model;

/**
 * Information Model
 */
class Information extends Child
{
    /**
     * @var array Custom validation error messages.
     */
    public $customMessages = [
        'field.required' => 'The field cannot be empty.',
        'value.required' => 'The value cannot be empty.'
    ];

    /**
     * @var array hasOne and other relations
     */
    public $belongsTo = [
        'human' => [
            'Mohsin\txt\Models\Human',
            'table' => 'mohsin_txt_parents'
        ]
    ];

    /**
     * Override the boot method to limit this model to robot
     * txts in the parent model.
     */
    protected static function boot()
    {
        static::addGlobalScope('information', function ($builder) {
            $builder->where('is_robot', 0);
        });
        parent::boot();
    }
}
