<?php namespace Mohsin\Txt\Controllers;

use Redirect;
use BackendMenu;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;
use System\Controllers\Settings as SettingsController;

/**
 * Settings Backend Controller
 */
class Settings extends SettingsController
{
    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();
        SettingsManager::setContext('Mohsin.Txt', 'settings');
        BackendMenu::setContext('October.System', 'system', 'settings');
    }

    public function index()
    {
        return $this->update('mohsin', 'txt', 'settings');
    }

    public function onSave()
    {
        $this->update_onSave('mohsin', 'txt', 'settings');
    }

    public function onResetDefault()
    {
        $this->update_onResetDefault('mohsin', 'txt', 'settings');
        return Redirect::refresh();
    }
}
