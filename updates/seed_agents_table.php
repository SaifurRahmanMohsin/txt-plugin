<?php namespace Mohsin\Txt\Updates;

use Mohsin\Txt\Models\Agent;
use October\Rain\Database\Updates\Seeder;

class SeedAgentsTable extends Seeder
{

    public function run()
    {
      $agents = [
            ['name' => '*',           'comment' => "All"],
            ['name' => 'Googlebot',   'comment' => "Google's web crawler"],
            ['name' => 'baiduspider', 'comment' => "Baidu's web crawler"],
            ['name' => 'Bingbot',     'comment' => "Microsoft's web crawler"],
            ['name' => 'ia_archiver', 'comment' => "The Internet Archive"],
            ['name' => 'Naverbot',    'comment' => "South Korean Naver web crawler"],
            ['name' => 'Yeti',        'comment' => "South Korean Yeti web crawler"],
            ['name' => 'seznambot',   'comment' => "Czech Republic Sezna web crawler"],
            ['name' => 'Slurp',       'comment' => "Yahoo! Slurp web crawler"],
            ['name' => 'Yandex',      'comment' => "Russian Yandex web crawler"],
        ];
        foreach($agents as $agent)
        Agent::updateOrCreate([
            'name'                 => $agent['name'],
            'comment'              => $agent['comment'],
        ]);
    }

}
