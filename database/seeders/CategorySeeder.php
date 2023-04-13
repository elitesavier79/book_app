<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            'Umun',
            'Filsafat dan Psikologi', 
            'Agama',
            'sosial',
            'Bahasa',
            'Saint dan Matematika',
            'teknologi',
            'seni dan Kreasi',
            'Literartur dan sastra',
            'sejarah dan Geografi'
        ];

        foreach ($data as $value) {
            Category::insert([
                'name' => $value
            ]);
        }
    }
}
