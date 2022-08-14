<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
   
class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('interests')->count() == 0){

            DB::table('interests')->insert([

                [
                    'interest' => 'Developing',
                    'description' => 'Writing code, reviewing etc.',
                ],
                [
                    'interest' => 'Designing',
                    'description' => 'I have no idea',
                ],
                [
                    'interest' => 'Writing',
                    'description' => '...',
                ]
            ]);
            
        }
    }
}