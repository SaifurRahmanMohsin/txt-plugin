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

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Txt Settings';
        $this -> instance = new SettingsController();
        $this -> instance -> update("mohsin","txt","settings");
        BackendMenu::setContext('Mohsin.Txt', 'txt', 'settings');
    }

    public function index() {}

    public function onSave()
    {
        $this -> instance -> update_onSave("mohsin","txt","settings");
    }

    public function onResetDefault()
    {
        $this -> instance -> update_onResetDefault("mohsin","txt","settings");
    }
}
