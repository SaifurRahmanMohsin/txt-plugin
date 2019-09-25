<?php

return [
  'plugin' => [
    'name' => 'Txt',
    'description' => '让你可以设置 humans.txt 和 robots.txt.'
  ],
  'robots' => [
    'label' => 'Robots',
    'description' => '添加 robot 条目.'
  ],
  'humans' => [
    'label' => 'Humans',
    'description' => '添加 human 条目.'
  ],
  'agent' => [
    'plural' => 'Agents',
    'description' => '添加 agent 条目.',
    'name' => 'Name',
    'name_comment' => 'Search Agent 的名称',
    'name_placeholder' => 'Googlebot',
    'comment' => '备注',
    'comment_comment' => '方便识别的 Agent 名称',
    'comment_placeholder' => 'Google 的 Web 爬虫',
    'clear_agent' => '清除 agents',
    'clear_agent_confirm' => '确定需要移除所有 agents?',
    'import_agent' => '导入 agents',
    'export_agent' => '导出 agents'
  ],
  'settings' => [
    'label' => '设置',
    'description' => '管理 Txt 设置。',
    'redirectpage' => [
      'label' => '重定向页面',
      'commentAbove' => '选择当 txt 禁用的时候重定向的页面'
    ],
    'use_humans' => [
      'label' => '启用 humans.txt?'
    ],
    'use_robots' => [
      'label' => '启用 robots.txt?'
    ],
    'human_fields' => [
      'singular' => 'Human 字段',
      'plural' => 'Human 字段',
      'prompt' => '创建新的 human 字段标记',
      'commentAbove' => '允许的 human 字段标记'
    ]
  ],
  'exception' => [
    'ask_enable' => '要查看此页内容，需要先启用 :file',
  ],
  'permissions' => [
    'access_settings' => '访问设置',
    'access_humans' => '访问 Humans',
    'access_robots' => '访问 Robots',
    'access_agents' => '访问 Agents',
  ],
];
