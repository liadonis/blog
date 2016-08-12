<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'link_name' => 'Google谷歌',
                'link_title' => '強大的搜尋引擎',
                'link_url' => 'https://www.google.com.tw/',
                'link_order' => 1,
            ],
            [
                'link_name' => 'Yahoo奇摩',
                'link_title' => '雅虎奇摩方便快速的入口網站',
                'link_url' => 'https://tw.yahoo.com/',
                'link_order' => 2,
            ],
        ];
        DB::table('links')->insert($data);
    }
}
