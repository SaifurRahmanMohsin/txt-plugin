<?php namespace Mohsin\Txt;

use System\Classes\PluginBase;
use Backend;

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
            'icon'        => 'icon-map-marker',
            'homepage'    => 'https://github.com/SaifurRahmanMohsin/Txt'
        ];
    }

    public function registerPermissions()
    {
        return [
            'mohsin.txt.access_settings' => [
                'tab'   => 'mohsin.txt::lang.plugin.name',
                'label' => 'mohsin.txt::lang.permissions.access_settings'
            ],
            'mohsin.txt.access_humans' => [
                'tab'   => 'mohsin.txt::lang.plugin.name',
                'label' => 'mohsin.txt::lang.permissions.access_humans'
            ],
            'mohsin.txt.access_robots' => [
                'tab'   => 'mohsin.txt::lang.plugin.name',
                'label' => 'mohsin.txt::lang.permissions.access_robots'
            ],
            'mohsin.txt.access_agents' => [
                'tab'   => 'mohsin.txt::lang.plugin.name',
                'label' => 'mohsin.txt::lang.permissions.access_agents'
            ]
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
                'permissions' => ['mohsin.txt.access_settings'],
                'keywords'    => 'txt robots humans'
            ],
            'humans' => [
                'label'       => 'mohsin.txt::lang.humans.label',
                'description' => 'mohsin.txt::lang.humans.description',
                'category'    => 'mohsin.txt::lang.plugin.name',
                'icon'        => 'icon-users',
                'order'       => 601,
                'permissions' => ['mohsin.txt.access_humans'],
                'url'         => Backend::url('mohsin/txt/humans')
            ],
            'robots' => [
                'label'       => 'mohsin.txt::lang.robots.label',
                'description' => 'mohsin.txt::lang.robots.description',
                'category'    => 'mohsin.txt::lang.plugin.name',
                'icon'        => 'icon-android',
                'order'       => 602,
                'permissions' => ['mohsin.txt.access_robots'],
                'url'         => Backend::url('mohsin/txt/robots')
            ],
            'agents' => [
                'label'       => 'mohsin.txt::lang.agent.plural',
                'description' => 'mohsin.txt::lang.agent.description',
                'category'    => 'mohsin.txt::lang.plugin.name',
                'icon'        => 'icon-search',
                'order'       => 603,
                'permissions' => ['mohsin.txt.access_agents'],
                'url'         => Backend::url('mohsin/txt/agents')
            ]
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'Mohsin\Txt\FormWidgets\HasMany\Widget' => [
                'label' => 'Hasmany',
                'code'  => 'owl-hasmany'
            ]
        ];
    }
}
