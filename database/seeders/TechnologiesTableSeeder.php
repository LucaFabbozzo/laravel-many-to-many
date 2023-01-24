<?php

namespace Database\Seeders;

use App\Models\Technologies;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['HTML', 'CSS', 'Javascript', 'PHP', 'MySql', 'VueJs', 'Laravel'];

        foreach($data as $tech) {
            $new_tech = new Technologies();
            $new_tech->name = $tech;
            $new_tech->slug = Str::slug($tech);
            $new_tech->save();
        }
    }
}
