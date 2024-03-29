<?php namespace Mohsin\Txt;

use Event;
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
            'icon'        => 'icon-map-marker',
            'homepage'    => 'https://github.com/SaifurRahmanMohsin/txt-plugin',
        ];
    }

    /**
     * boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('system.settings.extendItems', function ($settingsManager) {
            if (\Mohsin\Txt\Models\Setting::get('use_robots')) {
                $settingsManager->addSettingItems('Mohsin.txt', [
                    'robots' => [
                        'label'       => 'mohsin.txt::lang.robots.label',
                        'description' => 'mohsin.txt::lang.robots.description',
                        'category'    => 'mohsin.txt::lang.plugin.name',
                        'icon'        => 'icon-android',
                        'order'       => 601,
                        'permissions' => ['mohsin.txt.access_robots'],
                        'url'         => Backend::url('mohsin/txt/robots')
                    ],
                    'agents' => [
                        'label'       => 'mohsin.txt::lang.agent.plural',
                        'description' => 'mohsin.txt::lang.agent.description',
                        'category'    => 'mohsin.txt::lang.plugin.name',
                        'icon'        => 'icon-search',
                        'order'       => 602,
                        'permissions' => ['mohsin.txt.access_agents'],
                        'url'         => Backend::url('mohsin/txt/agents')
                    ]
                ]);
            }

            if (\Mohsin\Txt\Models\Setting::get('use_humans')) {
                $settingsManager->addSettingItems('Mohsin.txt', [
                    'humans' => [
                        'label'       => 'mohsin.txt::lang.humans.label',
                        'description' => 'mohsin.txt::lang.humans.description',
                        'category'    => 'mohsin.txt::lang.plugin.name',
                        'icon'        => 'icon-users',
                        'order'       => 603,
                        'permissions' => ['mohsin.txt.access_humans'],
                        'url'         => Backend::url('mohsin/txt/humans')
                    ]
                ]);
            }
        });
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
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

    /**
     * Registers any settings used by this plugin.
     *
     * @return array
     */
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
            ]
        ];
    }
}
