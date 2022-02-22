<?php namespace Mohsin\Txt\Controllers;

use Event;
use BackendMenu;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;

/**
 * Robots Backend Controller
 */
class Robots extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\RelationController::class,
        \Backend\Behaviors\ReorderController::class
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
     * @var string reorderConfig file
     */
    public $reorderConfig = 'config_reorder.yaml';

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();
        SettingsManager::setContext('Mohsin.Txt', 'robots');
        BackendMenu::setContext('October.System', 'system', 'settings');

        // Returns form model for dropdown options filtering.
        Event::listen('robot.agent.getContext', function () {
            $isUpdate = $this->action === 'update';
            return $isUpdate ? $this->formGetModel() : null;
        });
    }

    /**
     * Extend the query so that the related model is being reordered.
     * @param October\Rain\Database\Builder $query
     * @return void
     */
    public function reorderExtendQuery($query)
    {
        $recordId = current($this->params);
        $query->where('parent_id', $recordId);
    }
}
