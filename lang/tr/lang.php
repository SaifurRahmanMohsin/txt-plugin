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
  'agents' => [
    'label' => 'Agents',
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
      'label' => 'Human Fields',
      'commentAbove' => 'Comma - Seperated list of allowed human entries'
    ]
  ],
  'exception' => [
    'ask_enable' => 'Bu sayfaya erişmeden önce :file\'yi aktif etmelisiniz.',
  ]
];
