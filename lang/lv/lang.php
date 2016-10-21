<?php
return [
  'plugin' => [
    'name' => 'Txt',
    'description' => 'Atļauj izveidot humans.txt un robots.txt failus.'
  ],
  'robots' => [
    'label' => 'Robots',
    'description' => 'pievienot robots.txt ierakstus.'
  ],
  'humans' => [
    'label' => 'Humans',
    'description' => 'Pievienot humans.txt ierakstus.'
  ],
  'agents' => [
    'label' => 'Aģenti',
    'description' => 'Pievienot aģentu ierakstus.'
  ],
  'settings' => [
    'label' => 'Iestatījumi',
    'description' => 'Pārvaldīt konfigurāciju.',
    'redirectpage' => [
      'label' => 'Pāradresēšanas lapa',
      'commentAbove' => 'Izvēlies uz kuru lapu pāradresēt, kad Txt ir izslēgts'
    ],
    'use_humans' => [
      'label' => 'Ieslēgt humans.txt?'
    ],
    'use_robots' => [
      'label' => 'Ieslēgt robots.txt?'
    ],
    'human_fields' => [
      'label' => 'Humans.txt lauki',
      'commentAbove' => 'Ar komatiem atdalīti lauki, kas rādīsies humans.txt'
    ]
  ],
  'exception' => [
    'ask_enable' => 'Lūdzu iespēju :file failu, lai skatītu šo lapu',
  ],
  'permissions' => [
    'access_settings' => 'Piekļūt iestatījumiem',
    'access_humans' => 'Piekļūt humans.txt',
    'access_robots' => 'Pieklūt robots.txt',
    'access_agents' => 'Pieklūt aģentiem',
  ],
];