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
            'name'        => 'mohsin.radar::lang.plugin.name',
            'description' => 'mohsin.radar::lang.plugin.description',
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
                'category'    => 'system::lang.system.categories.cms',
                'icon'        => 'icon-cog',
                'url'         => Backend::url('mohsin/txt/settings'),
                'class'       => 'Mohsin\Txt\Models\Setting',
                'order'       => 500,
                'keywords'    => 'txt robots humans'
            ]
            ];
    }

    public function registerNavigation()
    {
        return [
            'txt' => [
                'label'       => 'Txt',
                'url'         => Backend::url('mohsin/txt/settings'),
                'icon'        => 'icon-pencil',
                'order'       => 500,

                'sideMenu' => [
                    'settings' => [
                        'label'       => 'Settings',
                        'icon'        => 'icon-copy',
                        'url'         => Backend::url('mohsin/txt/settings/'),
                    ],
                    'humans' => [
                        'label'       => 'Humans',
                        'icon'        => 'icon-copy',
                        'url'         => Backend::url('mohsin/txt/humans'),
                    ],
                    'robots' => [
                        'label'       => 'Robots',
                        'icon'        => 'icon-copy',
                        'url'         => Backend::url('mohsin/txt/robots'),
                    ],
                ]
            ]
        ];
    }
}
