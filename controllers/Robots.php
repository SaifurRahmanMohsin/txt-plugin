<?php namespace Mohsin\Txt\Controllers;

use File;
use Backend;
use BackendMenu;
use Mohsin\Txt\Models\Robot;
use Mohsin\Txt\Models\Setting;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;

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

        SettingsManager::setContext('Mohsin.Txt', 'robots');
        BackendMenu::setContext('October.System', 'system', 'settings');

        if(!Setting::get('use_robots'))
            $this -> enabled = false;
    }

    public function onDownload()
    {
        return Backend::redirect('mohsin/txt/robots/download');
    }

    public function download()
    {
        $filePath = tempnam(storage_path(), "txt");
        File::put($filePath, Robot::first()->generateTxt());
        return response()->download($filePath, 'robots.txt')->deleteFileAfterSend(true);
    }

    public function listOverrideColumnValue($record, $columnName)
    {
        if($columnName == "directives")
            return count($record -> directives);
    }
}
