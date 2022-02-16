<?php namespace Mohsin\Txt\Controllers;

use Backend;
use BackendMenu;
use Mohsin\Txt\Models\Agent;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;

/**
 * Agents Backend Controller
 */
class Agents extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\ImportExportController::class
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var string importExportConfig file
     */
    public $importExportConfig = 'config_import_export.yaml';

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();
        SettingsManager::setContext('Mohsin.Txt', 'agents');
        BackendMenu::setContext('October.System', 'system', 'settings');
    }

    /**
     * Clears all the entries from the agents model.
     *
     * @return Redirect
     */
    public function onClear()
    {
        Agent::truncate();
        return Backend::redirect('mohsin/txt/agents');
    }
}
