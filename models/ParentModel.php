<?php namespace Mohsin\Txt\Models;

use Model;

/**
 * Parent Model
 */
class ParentModel extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'mohsin_txt_parents';

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * @var array rules for validation
     */
    public $rules = [
        'key' => 'required'
    ];

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [
        'key'
    ];

    /**
     * Scope to only include only robot txts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRobots($query)
    {
        return $query->where('is_robot', 1);
    }

    /**
     * Scope to only include only human txts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHumans($query)
    {
        return $query->where('is_robot', 0);
    }

    /**
     * Override beforeSave to ensure it's saved correctly.
     *
     * @return void
     */
    public function beforeSave()
    {
        $this->is_robot = $this instanceof \Mohsin\Txt\Models\Robot;
    }
}
