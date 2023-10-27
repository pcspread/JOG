<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// DB読込
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            [
                'name' => 'コンサートスタッフ',
            ],
            [
                'name' => 'イベントスタッフ',
            ],
            [
                'name' => 'カフェ',
            ],
            [
                'name' => 'ホテルスタッフ',
            ],
            [
                'name' => '水族館',
            ],
            [
                'name' => '配布',
            ],
        ]);
    }
}
