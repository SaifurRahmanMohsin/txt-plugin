<?php

return [
  'plugin' => [
    'name' => 'Txt',
    'description' => 'Allows you to set humans.txt and robots.txt.'
  ],
  'robots' => [
    'label' => 'Robots',
    'description' => 'Add robot entries.'
  ],
  'humans' => [
    'label' => 'Humans',
    'description' => 'Add human entries.'
  ],
  'agents' => [
    'label' => 'Agents',
    'description' => 'Add agent entries.'
  ],
  'settings' => [
    'label' => 'Settings',
    'description' => 'Manage Txt configuration.',
    'redirectpage' => [
      'label' => 'Redirect Page',
      'commentAbove' => 'Select which page to redirect to when the txt is disabled'
    ],
    'use_humans' => [
      'label' => 'Enable humans.txt?'
    ],
    'use_robots' => [
      'label' => 'Enable robots.txt?'
    ],
    'human_fields' => [
      'label' => 'Human Fields',
      'commentAbove' => 'Comma - Seperated list of allowed human entries'
    ]
  ],
  'exception' => [
    'ask_enable' => 'First enable :file to view this page',
  ],
  'permissions' => [
    'access_settings' => 'Access settings',
    'access_humans' => 'Access Humans',
    'access_robots' => 'Access Robots',
    'access_agents' => 'Access Agents',
  ],
];
