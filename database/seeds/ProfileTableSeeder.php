<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 20; ++$i) {
            DB::table('profiles')->insert([
            'name' => "安倍信三$i",
            'image_path' => 'abe.jpg',
            'message' => '私に投票してください',
            ]);
        }
    }
}
