<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Malware', 'Phishing', 'Denial of Service', 'Data Breach'];

        foreach ($categories as $category) {
            Category::firstOrCreate(['title' => $category]);
        }
    }
}
