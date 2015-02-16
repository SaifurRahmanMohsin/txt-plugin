<?php namespace Mohsin\Txt\Controllers;

use BackendMenu;
use Mohsin\Txt\Models\Setting;
use Backend\Classes\Controller;

/**
 * Robots Back-end Controller
 */
class Robots extends Controller
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

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Mohsin.Txt', 'txt', 'robots');

        if(!Setting::get('use_robots'))
            $this -> enabled = false;
    }
}