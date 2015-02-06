<?php namespace Mohsin\Txt\Controllers;

use Lang;
use Backend;
use BackendMenu;
use ApplicationException;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;
use System\Controllers\Settings as SettingsController;

/**
 * Settings Back-end Controller
 */
class Settings extends Controller
{
    public $instance;

    public $details;

    public function __construct()
    {
        parent::__construct();
        $this -> details = array("author" => "mohsin", "plugin" => "txt", "code" => "settings");
        $this -> instance = new SettingsController();
        
        $this -> instance -> update(
            $this -> details['author'],
            $this -> details['plugin'],
            $this -> details['code']);

        $manager = SettingsManager::instance();
        //die('hi' .$this -> url);
        BackendMenu::setContext('Mohsin.Txt', 'txt', 'settings');
        SettingsManager::setContext('Mohsin.Txt', 'settings');
    }

    public function index() {}

    public function onSave()
    {
        $this -> instance -> update_onSave(
            $this -> details['author'],
            $this -> details['plugin'],
            $this -> details['code']);
    }

    public function onResetDefault()
    {
        $this -> instance -> update_onResetDefault(
            $this -> details['author'],
            $this -> details['plugin'],
            $this -> details['code']);
    }

}