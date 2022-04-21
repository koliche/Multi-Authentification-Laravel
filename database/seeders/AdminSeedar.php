<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;   
class AdminSeedar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory(1)->create();
    }
}
