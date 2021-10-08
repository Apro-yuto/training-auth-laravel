<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Read;

class ReadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Read::factory(10)->create();
    }
}
