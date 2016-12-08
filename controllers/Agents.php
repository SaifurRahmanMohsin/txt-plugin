<?php namespace Mohsin\Txt\Controllers;

use Flash;
use Redirect;
use BackendMenu;
use GuzzleHttp\Client;
use ApplicationException;
use Mohsin\Txt\Models\Agent;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;
use GuzzleHttp\Exception\RequestException;

/**
 * Agents Back-end Controller
 */
class Agents extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ImportExportController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $importExportConfig = 'config_import_export.yaml';

    public function __construct()
    {
        parent::__construct();

        SettingsManager::setContext('Mohsin.Txt', 'agents');
        BackendMenu::setContext('October.System', 'system', 'settings');
    }

    /**
     * Returns the populate controller action.
     *
     * @return action
     */
    public function populate()
    {
    	$this->pageTitle = "Populate";
    	$this->addJs('/modules/backend/widgets/lists/assets/js/october.list.js', 'core');
    }

    /**
     * Fetches content from given URL and parses it into the list.
     *
     * @return void
     */
    public function onFetch()
    {
      // Initialization
    	$url = trim(post('url'));
    	if(empty($url)) throw new ApplicationException('URL field is empty');
      $client = new Client();

      // Fetch contents from given URL
    	try {
  			$response = $client->get($url);
  		} catch(RequestException $ex) {
  			throw new ApplicationException('The resource appears to be unavailable at the specified URL');
  		}

      // Split the elements and inject it into the page
			$agents = explode("\n", $response->getBody());
    	$this -> vars['delimiter'] = post('delimiter');
    	$this -> vars['items'] = $agents;
    }

    /**
     * Adds all the selected entries to the agents model
     * and redirects to the agents page
     *
     * @return Redirect
     */
    public function onAccept()
    {
      if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
        foreach ($checkedIds as $item) {
        		$item = explode(post('delimiter'), $item);
						$agent = new Agent;
						$agent->name = $item[0];
						$agent->comment = $item[1];
						if(Agent::whereName($item[0])->count() > 0)
							continue;
						$agent->save();
        }
        Flash::success('Successfully Added Items');
      }
    	return Redirect::to('backend/mohsin/txt/agents');
    }

    /**
     * Clears all the entries from the agents model.
     *
     * @return void
     */
    public function onClear()
    {
      Agent::truncate();
      return Redirect::to('backend/mohsin/txt/agents');
    }
}
