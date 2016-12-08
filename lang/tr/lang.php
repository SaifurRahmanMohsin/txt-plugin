<?php
return [
  'plugin' => [
    'name' => 'Txt',
    'description' => 'humans.txt robots.txt dosyalarını düzenlemenizi sağlar.'
  ],
  'robots' => [
    'label' => 'Robots',
    'description' => 'Robot kayıtları.'
  ],
  'humans' => [
    'label' => 'Humans',
    'description' => 'Human kayıtları.'
  ],
  'agent' => [
    'plural' => 'Agents',
    'description' => 'Agent kayıtları.'
  ],
  'settings' => [
    'label' => 'Ayarlar',
    'description' => 'TXT ayarlarını yönet.',
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
    'ask_enable' => 'Bu sayfaya erişmeden önce :file\'yi aktif etmelisiniz.',
  ]
];
