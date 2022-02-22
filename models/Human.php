<?php namespace Mohsin\Txt\Models;

use Model;
use Event;

/**
 * Human Model
 */
class Human extends ParentModel
{
    /**
     * @var array guarded attributes aren't mass assignable
     */
    protected $guarded = ['*'];

    /**
     * @var array Custom validation error messages.
     */
    public $customMessages = [
        'key.required' => 'Attribution field cannot be empty.'
    ];

    /**
     * @var array hasOne and other relations
     */
    public $hasMany = [
        'information' => [
            'Mohsin\Txt\Models\Information',
            'table' => 'mohsin_txt_children',
            'key'   => 'parent_id',
            'order' => 'position asc'
        ],
        'information_count' => [
            'Mohsin\Txt\Models\Information',
            'table' => 'mohsin_txt_children',
            'order' => 'position asc',
            'key'   => 'parent_id',
            'count' => true
        ]
    ];

    /**
     * Override the boot method to limit this model to robot
     * txts in the parent model.
     */
    protected static function boot()
    {
        static::addGlobalScope('humans', function ($builder) {
            $builder->where('is_robot', 0);
        });
        parent::boot();
    }

    /**
     * Overloads the type attribute to use the parent equivalent.
     *
     * @return string
     */
    public function getAttributionAttribute()
    {
        return $this->key;
    }

    /**
     * Overloads the attribution attribute to use the parent equivalent.
     *
     * @return string
     */
    public function setAttributionAttribute($value)
    {
        $this->key = $value;
    }

    /**
     * Returns associative array of available attributions.
     *
     * @return array The available attribution options.
     */
    public function getAttributionOptions($fieldName = null, $keyValue = null)
    {
        // Get all possible human attributes.
        $allHumanFields = Setting::get('human_fields');
        $allHumanFields = array_column($allHumanFields, 'human_field');

        // Remove used human attributes.
        $removedValues = array_values($this->lists('key', 'id'));

        // In the update context, let the human attribute that's being updated exist.
        $isUpdateContext = Event::fire('human.information.getContext');
        if ($isUpdateContext) {
            $keyToExclude = current($isUpdateContext)->attribution;
            if (($key = array_search($keyToExclude, $removedValues)) !== false) {
                unset($removedValues[$key]);
            }
        }
        $activeHumanFields = array_diff($allHumanFields, $removedValues);
        return array_combine($activeHumanFields, $activeHumanFields);
    }

    /**
     * Returns generated text from the Humans model.
     *
     * @return string
     */
    public function generateTxt()
    {
        $humans = '';
        foreach (Human::all() as $human) {
            if (count($human->information) > 0) {
                $humans .= '/* ' . $human->attribution . ' */' . PHP_EOL;
                foreach ($human->information as $information) {
                    $humans .= $information->field . ': ' .$information->value . PHP_EOL;
                    $humans .= $information->new_line ? PHP_EOL : '';
                }
                $humans .= PHP_EOL;
            }
        }
        return $humans;
    }
}
