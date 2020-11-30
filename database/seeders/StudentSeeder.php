<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //\App\Models\Student::factory(50)->create();
        DB::table('students')->insert([
            'program_id'=>'1',
        	'name' => 'Kiss Balazs',
        	'email'=> 'kisbalazs@gmail.com',
        ]);
        DB::table('students')->insert([
            'program_id'=>'1',
        	'name' => 'Nagy Peter',
        	'email'=> 'nagypeter@gmail.com',
        ]);
        DB::table('students')->insert([
            'program_id'=>'1',
            'name' => 'Keksz Fülöp',
            'email'=> 'kfulop@gmail.com',
        ]);
        DB::table('students')->insert([
            'program_id'=>'2',
            'name' => 'Gezder Misi',
            'email'=> 'misi@gmail.com',
        ]);
        DB::table('students')->insert([
            'program_id'=>'3',
            'name' => 'Nagy Erna',
            'email'=> 'nerna@gmail.com',
        ]);
        DB::table('students')->insert([
            'program_id'=>'2',
            'name' => 'Szasz Reka',
            'email'=> 'szreka@gmail.com',
        ]);
    }
}
