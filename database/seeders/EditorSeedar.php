<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Editor; 
class EditorSeedar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Editor::factory(1)->create();
    }
}
