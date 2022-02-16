<?php namespace Mohsin\Txt\Models;

use Model;
use Cms\Classes\Page;

/**
 * Setting Model
 */
class Setting extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'mohsin_txt_settings';

    public $settingsFields = 'fields.yaml';

    /**
     * Reset the settings to the default values.
     */
    public function resetDefault()
    {
        $this::set([
            'use_robots'   => 0,
            'use_humans'   => 0,
            'redirectpage' => key(Page::getNameList()),
            'human_fields' => [
                ['human_field' => 'Team', 'is_enabled' => true ],
                ['human_field' => 'Site'],
                ['human_field' => 'Thanks'],
                ['human_field' => 'Technology'],
            ]
        ]);
    }

    /**
     * Returns the list of CMS pages.
     *
     * @return array
     */
    public function getRedirectpageOptions($keyValue = null)
    {
        return Page::getNameList();
    }
}
