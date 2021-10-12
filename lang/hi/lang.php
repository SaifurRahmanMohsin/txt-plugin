<?php

return [
  'plugin' => [
    'name' => 'Txt',
    'description' => 'आपको human.txt और robots.txt सेट करने की अनुमति देता है.'
  ],
  'robots' => [
    'label' => 'रोबोटों',
    'description' => 'रोबोट प्रविष्टियां जोड़ें.'
  ],
  'humans' => [
    'label' => 'इंसानों',
    'description' => 'मानव प्रविष्टियाँ जोड़ें.'
  ],
  'agent' => [
    'plural' => 'एजेंटों',
    'description' => 'एजेंट प्रविष्टियाँ जोड़ें.',
    'name' => 'नाम',
    'name_comment' => 'खोज एजेंट का नाम',
    'name_placeholder' => 'गूगलबॉट',
    'comment' => 'टिप्पणी',
    'comment_comment' => 'एजेंट की पहचान करने के लिए एक मानव अनुकूल नाम',
    'comment_placeholder' => 'गूगल का वेब क्रॉलर',
    'clear_agent' => 'एजेंट साफ़ करें',
    'clear_agent_confirm' => 'क्या आप वाकई सभी एजेंटों को हटाना चाहते हैं?',
    'import_agent' => 'आयात एजेंट',
    'export_agent' => 'निर्यात एजेंट'
  ],
  'settings' => [
    'label' => 'समायोजन',
    'description' => 'टेक्स्ट कॉन्फ़िगरेशन प्रबंधित करें.',
    'redirectpage' => [
      'label' => 'रीडायरेक्ट पेज',
      'commentAbove' => 'चुनें कि txt अक्षम होने पर किस पेज पर रीडायरेक्ट करना है'
    ],
    'use_humans' => [
      'label' => 'human.txt सक्षम करें?'
    ],
    'use_robots' => [
      'label' => 'robots.txt सक्षम करें?'
    ],
    'human_fields' => [
      'singular' => 'मानव क्षेत्र',
      'plural' => 'मानव क्षेत्र',
      'prompt' => 'नया मानव फ़ील्ड लेबल बनाएं',
      'commentAbove' => 'स्वीकृत मानव फ़ील्ड लेबल'
    ]
  ],
  'exception' => [
    'ask_enable' => 'पहले सक्षम करें :file इस पृष्ठ को देखने के लिए',
  ],
  'permissions' => [
    'access_settings' => 'एक्सेस सेटिंग्स',
    'access_humans' => 'इंसानों तक पहुंचें',
    'access_robots' => 'एक्सेस रोबोट',
    'access_agents' => 'एक्सेस एजेंट',
  ],
];
