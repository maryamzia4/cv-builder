<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cv;

class CvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cv::create([
            'name' => 'Maryam Zia Choudhry',
            'title' => 'Computer Scientist',
            'email' => 'maryamchaudary4@gmail.com',
            'phone' => '+923335017221',
            'location' => 'Islamabad',
            'linkedin' => 'https://linkedin.com/in/maryamzia4'
        ]);
    }
}
