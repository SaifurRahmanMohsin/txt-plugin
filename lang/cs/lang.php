<?php

return [
  'plugin' => [
    'name' => 'Txt',
    'description' => 'Umožňuje nastavit humans.txt a robots.txt.'
  ],
  'robots' => [
    'label' => 'Robots.txt',
    'description' => 'Přidat nový robots.txt záznam'
  ],
  'humans' => [
    'label' => 'Humans.txt',
    'description' => 'Přidat nový humans.txt záznam'
  ],
  'agents' => [
    'label' => 'Agenti',
    'description' => 'Přidat nového agenta'
  ],
  'settings' => [
    'label' => 'Nastavení',
    'description' => 'Spravovat nastavení Txt.',
    'redirectpage' => [
      'label' => 'Stránka pro přesměrování',
      'commentAbove' => 'Nastavte na jakou stránku se přesměruje, pokud je plugin Txt vypnutý'
    ],
    'use_humans' => [
      'label' => 'Aktivovat humans.txt?'
    ],
    'use_robots' => [
      'label' => 'Aktivovat robots.txt?'
    ],
    'human_fields' => [
      'label' => 'Záznamy humans.txt',
      'commentAbove' => 'Čárkou oddělené záznamy, které se mají vypsat v humans.txt. Pokud necháte prázdné, předvyplní se automaticky Team, Site, Thanks, Technology.'
    ]
  ],
  'exception' => [
    'ask_enable' => 'Nejdříve zapněte :file aby jste mohli změnit jeho nastavení!',
  ]
];
