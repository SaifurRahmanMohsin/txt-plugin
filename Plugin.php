<?php namespace Mohsin\Txt;

use Backend;
use System\Classes\PluginBase;

/**
 * Txt Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'mohsin.txt::lang.plugin.name',
            'description' => 'mohsin.txt::lang.plugin.description',
            'author'      => 'Saifur Rahman Mohsin',
            'icon'        => 'icon-map-marker'
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'mohsin.txt::lang.settings.label',
                'description' => 'mohsin.txt::lang.settings.description',
                'category'    => 'mohsin.txt::lang.plugin.name',
                'icon'        => 'icon-cog',
                'url'         => Backend::url('mohsin/txt/settings'),
                'class'       => 'Mohsin\Txt\Models\Setting',
                'order'       => 600,
                'keywords'    => 'txt robots humans'
            ],
            'humans' => [
                'label'       => 'mohsin.txt::lang.humans.label',
                'description' => 'mohsin.txt::lang.humans.description',
                'category'    => 'mohsin.txt::lang.plugin.name',
                'icon'        => 'icon-users',
                'order'       => 601,
                'url'         => Backend::url('mohsin/txt/humans')
            ],
            'robots' => [
                'label'       => 'mohsin.txt::lang.robots.label',
                'description' => 'mohsin.txt::lang.robots.description',
                'category'    => 'mohsin.txt::lang.plugin.name',
                'icon'        => 'icon-android',
                'order'       => 602,
                'url'         => Backend::url('mohsin/txt/robots')
            ],
            'agents' => [
                'label'       => 'mohsin.txt::lang.agents.label',
                'description' => 'mohsin.txt::lang.agents.description',
                'category'    => 'mohsin.txt::lang.plugin.name',
                'icon'        => 'icon-search',
                'order'       => 603,
                'url'         => Backend::url('mohsin/txt/agents')
            ]
            ];
    }

		public function registerFormWidgets()
		{
		    return [
		        'Owl\FormWidgets\HasMany\Widget' => [
		            'label' => 'Hasmany',
		            'code' => 'owl-hasmany'
		        ],
		    ];
		}
}
