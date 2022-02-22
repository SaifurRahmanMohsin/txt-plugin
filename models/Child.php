<?php namespace Mohsin\Txt\Models;

use Model;

/**
 * Child Model
 */
class Child extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table associated with the model
     */
    public $table = 'mohsin_txt_children';

    /**
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * @var array fillable attributes are mass assignable
     */
    protected $fillable = [
        'field',
        'value',
        'new_line'
    ];

    /**
     * @var array rules for validation
     */
    public $rules = [
        'field' => 'required',
        'value' => 'required'
    ];

    /**
     * Scope to only include only robot directives.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDirectives($query)
    {
        return $query->where('is_robot', 1);
    }

    /**
     * Scope to only include only human information.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInformation($query)
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
        $this->is_robot = $this instanceof \Mohsin\Txt\Models\Directive;
    }
}
