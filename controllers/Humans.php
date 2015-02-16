<?php namespace Mohsin\Txt\Controllers;

use BackendMenu;
use Mohsin\Txt\Models\Setting;
use Backend\Classes\Controller;

/**
 * Humans Back-end Controller
 */
class Humans extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    /**
     * @var boolean Stores whether the txt is enabled or not.
     */
    public $enabled = true;

    /**
     * @var array The human entries.
     */
    protected $humans;

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Mohsin.Txt', 'txt', 'humans');

        if(!Setting::get('use_humans'))
            $this -> enabled = false;
    }

    public function generateTxt()
    {
        if (!$this->humans)
            return "This is humans.txt. Yet to be implemented";
    }
}