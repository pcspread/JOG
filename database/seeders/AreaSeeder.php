<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// DB読込
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('areas')->insert([
            [
                'name' => '千代田区'
            ],
            [
                'name' => '中央区'
            ],
            [
                'name' => '港区'
            ],
            [
                'name' => '新宿区'
            ],
            [
                'name' => '文京区'
            ],
            [
                'name' => '台東区'
            ],
            [
                'name' => '墨田区'
            ],
            [
                'name' => '江東区'
            ],
            [
                'name' => '品川区'
            ],
            [
                'name' => '目黒区'
            ],
            [
                'name' => '大田区'
            ],
            [
                'name' => '世田谷区'
            ],
            [
                'name' => '渋谷区'
            ],
            [
                'name' => '中野区'
            ],
            [
                'name' => '杉並区'
            ],
            [
                'name' => '豊島区'
            ],
            [
                'name' => '北区'
            ],
            [
                'name' => '荒川区'
            ],
            [
                'name' => '板橋区'
            ],
            [
                'name' => '練馬区'
            ],
            [
                'name' => '足立区'
            ],
            [
                'name' => '葛飾区'
            ],
            [
                'name' => '江戸川区'
            ],
        ]);
    }
}
