<?php

namespace Database\Seeders;

use App\Models\publishers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MachinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        publishers::create([
            'name' => 'CleitinhoDoGrau'
        ]);
    }
}
