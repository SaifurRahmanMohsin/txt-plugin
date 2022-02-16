<?php namespace Mohsin\Txt\Models;

use Backend\Models\ImportModel;
use Exception;

class AgentImport extends ImportModel
{
    /**
     * @var array The rules to be applied to the data.
     */
    public $rules = [
        'name' => 'required'
    ];

    public function importData($results, $sessionKey = null)
    {
        foreach ($results as $row => $data) {
            try {
                $agent = new Agent;
                $agent->fill($data);
                $agent->save();

                $this->logCreated();
            }
            catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }
        }
    }
}
