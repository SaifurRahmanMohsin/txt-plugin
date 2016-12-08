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
  'agent' => [
    'plural' => 'Agents',
    'description' => 'Add agent entries.',
    'name' => 'Name',
    'name_comment' => 'The name of the search agent',
    'name_placeholder' => 'Googlebot',
    'comment' => 'Comment',
    'comment_comment' => 'A human friendly name to identify the agent',
    'comment_placeholder' => 'Google\'s Web Crawler',
    'clear_agent' => 'Clear agents',
    'clear_agent_confirm' => 'Are you sure you want to remove all agents?',
    'import_agent' => 'Import agents',
    'export_agent' => 'Export agents'
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
      'singular' => 'Human Field',
      'plural' => 'Human Fields',
      'prompt' => 'Create new human field label',
      'commentAbove' => 'Allowed human fields labels'
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
