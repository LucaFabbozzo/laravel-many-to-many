<?php

namespace Database\Seeders;

use App\Models\Technology;
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
        $data = ['HTML', 'CSS', 'Javascript', 'VueJs', 'Bootstrap', 'Laravel', 'MySql'];

        foreach ($data as $technology) {
            $new_tech = new Technology();
            $new_tech->name =$technology;
            $new_tech->slug = Str::slug($technology);
            $new_tech->save();
        }
    }
}
