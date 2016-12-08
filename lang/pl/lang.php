<?php

return [
  'plugin' => [
    'name' => 'Txt',
    'description' => 'Pozwala na zarządzanie rekordami w humans.txt i robots.txt.'
  ],
  'robots' => [
    'label' => 'Robots',
    'description' => 'Dodaj rekordy do robots.txt.'
  ],
  'humans' => [
    'label' => 'Humans',
    'description' => 'Dodaj rekordy do human.txt.'
  ],
  'agent' => [
    'plural' => 'User-Agents',
    'description' => 'Zarządzaj agentami (user-agents).'
  ],
  'settings' => [
    'label' => 'Ustawienia',
    'description' => 'Zarządzaj konfiguracją modułu Txt.',
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
    'ask_enable' => 'Najpierw włącz możliwość edycji :file w ustawieniach by zobaczyć tą stronę',
  ]
];
