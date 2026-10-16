<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustrySeeder extends Seeder
{
    public function run(): void
    {
        $industries = [
            ['slug' => 'real-estate',     'roman' => 'I',    'title' => 'Real Estate & Infrastructure',       'short' => 'Commercial and residential construction, roads, highways, water systems and civil engineering.',          'icon' => '🏗️', 'color' => '#8B6914', 'sort_order' => 1],
            ['slug' => 'banking',         'roman' => 'II',   'title' => 'Banking & Finance',                   'short' => 'Commercial banking, corporate finance and asset management services.',                                  'icon' => '🏦', 'color' => '#1a4b8c', 'sort_order' => 2],
            ['slug' => 'oil-gas-energy',  'roman' => 'III',  'title' => 'Oil, Gas & Energy',                   'short' => 'Exploration, substations, transmission systems and energy infrastructure.',                             'icon' => '⚡', 'color' => '#7c1d1d', 'sort_order' => 3],
            ['slug' => 'mining',          'roman' => 'IV',   'title' => 'Mining & Industrial Operations',      'short' => 'Mineral exploration, aluminum and steel processing, industrial manufacturing.',                         'icon' => '⛏️', 'color' => '#3d2b1f', 'sort_order' => 4],
            ['slug' => 'pharmaceuticals', 'roman' => 'V',    'title' => 'Pharmaceuticals',                     'short' => 'Pharmaceutical manufacturing, distribution, and healthcare supply chain.',                              'icon' => '💊', 'color' => '#1a6b4a', 'sort_order' => 5],
            ['slug' => 'logistics',       'roman' => 'VI',   'title' => 'Logistics, Shipping & Transportation','short' => 'Import and export logistics, shipping, aviation, ports and harbor management.',                         'icon' => '🚢', 'color' => '#1e3a5f', 'sort_order' => 6],
            ['slug' => 'agriculture',     'roman' => 'VII',  'title' => 'Agriculture & Agro-Processing',       'short' => 'Farming, food processing, cold storage, warehousing and agro value chain.',                            'icon' => '🌾', 'color' => '#3d6b1a', 'sort_order' => 7],
            ['slug' => 'marine',          'roman' => 'VIII', 'title' => 'Marine & Heavy Equipment Services',   'short' => 'Marine operations, earth-moving machinery, railroad and off-road equipment.',                          'icon' => '⚓', 'color' => '#0d4f6b', 'sort_order' => 8],
            ['slug' => 'commercial',      'roman' => 'IX',   'title' => 'Commercial & Social Infrastructure',  'short' => 'Educational projects, hospitals, warehouses, tank farms and commercial courts.',                        'icon' => '🏛️', 'color' => '#4a1a6b', 'sort_order' => 9],
        ];

        foreach ($industries as $industry) {
            DB::table('industries')->updateOrInsert(
                ['slug' => $industry['slug']],
                array_merge($industry, [
                    'is_active'  => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
