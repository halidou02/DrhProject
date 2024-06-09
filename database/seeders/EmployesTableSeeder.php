<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employe;

class EmployesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employe::factory()->count(25)->create();
    }
}
