<?php namespace Mohsin\Txt\Controllers;

use BackendMenu;
use Mohsin\Txt\Models\Setting;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;

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

        SettingsManager::setContext('Mohsin.Txt', 'humans');
        BackendMenu::setContext('October.System', 'system', 'settings');

        if(!Setting::get('use_humans'))
            $this -> enabled = false;
    }

    public function listOverrideColumnValue($record, $columnName){
        if( $columnName == "information" )
            return $record -> information -> implode('value', ', ');
    }
}