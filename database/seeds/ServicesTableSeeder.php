<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'strzyżenie damskie',
            'price' => 90
        ]);
        DB::table('services')->insert([
            'name' => 'strzyżenie męskie',
            'price' => 60
        ]);
        DB::table('services')->insert([
            'name' => 'strzyżenie grzywki',
            'price' => 15
        ]);
        DB::table('services')->insert([
            'name' => 'strzyżenie damskie',
            'price' => 90
        ]);
        DB::table('services')->insert([
            'name' => 'modelowanie damskie',
            'price' => 	60
        ]);
        DB::table('services')->insert([
            'name' => 'modelowanie męskie',
            'price' => 40
        ]);
        DB::table('services')->insert([
            'name' => 'koloryzacja',
            'price' => 150
        ]);
        DB::table('services')->insert([
            'name' => 'refleksy',
            'price' => 100
        ]);

    }
}
