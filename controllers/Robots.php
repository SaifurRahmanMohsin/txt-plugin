<?php namespace Mohsin\Txt\Controllers;

use BackendMenu;
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

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Mohsin.Txt', 'txt', 'robots');
    }
}