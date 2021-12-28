<?php

namespace Database\Seeders;

use App\Models\admin\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $use_condetions = Page::create([
            'name' => [
                'ar' => 'شروط الاستخدام',
                'de' => 'AGB'
            ],
            'title' => [
                'ar' => 'شروط الاستخدام',
                'de' => 'ALLGEMEINE GESCHÄFTSBEDINGUNGEN MIT KUNDENINFORMATIONEN'
            ],
            'description' => [
                'ar' => 'تست',
                'de' => 'test'
            ]
        ]);
    }
}
