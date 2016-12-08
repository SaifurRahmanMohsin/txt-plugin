<?php namespace Mohsin\Txt\Models;

use Backend\Models\ImportModel;
use Exception;

/**
 * Agent Import Model
 */
 class AgentImport extends ImportModel
 {
     /**
      * @var string The database table used by the model.
      */
     public $table = 'mohsin_txt_agents';

     /**
      * Validation rules
      */
     public $rules = [
         'name' => 'required'
     ];

     public function importData($results, $sessionKey = null)
     {
         foreach ($results as $row => $data) {

             try {

                /*
                 * Find or create
                 */
                $agent = Agent::make();

                // Update duplicates
                $agent = Agent::where('name', array_get($data, 'name'))->first() ?: $agent;

                $agentExists = $agent->exists;

                foreach ($data as $attribute => $value) {
                    $agent->{$attribute} = $value ?: null;
                }

                $agent->save();

                /*
                 * Log results
                 */
                if ($agentExists) {
                    $this->logUpdated();
                }
                else {
                    $this->logCreated();
                }
             }
             catch (Exception $ex) {
                 $this->logError($row, $ex->getMessage());
             }

         }
     }
 }
