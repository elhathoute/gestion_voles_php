<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            ['name' => 'Terminé'],
            ['name' => 'En cours'],
            ['name' => 'Programmé'],
        ];

        DB::table('status')->insert($statuses);
    }
}
