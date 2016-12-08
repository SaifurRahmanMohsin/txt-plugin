<?php namespace Mohsin\Txt\Models;

use Backend\Models\ExportModel;
use Exception;

class AgentExport extends ExportModel
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'mohsin_txt_agents';

    public function exportData($columns, $sessionKey = null)
    {
        $agents = self::all();
        $agents->each(function($agent) use ($columns) {
            $agent->addVisible($columns);
        });
        return $agents->toArray();
    }
}
