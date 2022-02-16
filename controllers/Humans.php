<?php namespace Mohsin\Txt\Controllers;

use Event;
use BackendMenu;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;

/**
 * Humans Backend Controller
 */
class Humans extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\RelationController::class
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
     * @var string relationConfig file
     */
    public $relationConfig = 'config_relation.yaml';

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();
        SettingsManager::setContext('Mohsin.Txt', 'humans');
        BackendMenu::setContext('October.System', 'system', 'settings');

        // Returns form model for dropdown options filtering.
        Event::listen('human.information.getContext', function () {
            $isUpdate = $this->action === 'update';
            return $isUpdate ? $this->formGetModel() : null;
        });
    }
}
