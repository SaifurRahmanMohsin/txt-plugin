<?php namespace Mohsin\Txt\Models;

use Model;

/**
 * Human Model
 */
class Human extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsin_txt_humans';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}