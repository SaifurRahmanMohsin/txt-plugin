<?php namespace Mohsin\Txt\Models;

use Backend\Models\ExportModel;

class AgentExport extends ExportModel
{
    public function exportData($columns, $sessionKey = null)
    {
        $agent = Agent::all();
        $agent->each(function ($agent) use ($columns) {
            $agent->addVisible($columns);
        });
        return $agent->toArray();
    }
}
