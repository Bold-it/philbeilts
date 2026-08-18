<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\JobListing;

class HomeController extends Controller
{
    public function index()
    {
        $industries = $this->getIndustries();
        $subsidiaries = $this->getSubsidiaries();
        
        // Fetch real posts from DB or fallback
        $news = Post::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Fetch real active jobs from DB or fallback
        $jobs = JobListing::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('home', compact('industries', 'subsidiaries', 'news', 'jobs'));
    }

    public static function getIndustries()
    {
        return [
            ['slug' => 'real-estate', 'roman' => 'I', 'title' => 'Real Estate & Infrastructure', 'short' => 'Commercial and residential construction, roads, highways, water systems and civil engineering.', 'icon' => '🏗️', 'color' => '#8B6914', 'services' => ['Real estate development', 'Commercial and residential construction', 'Roads and highways construction', 'Water systems construction', 'Civil engineering works', 'General construction consultancy', 'Design and build services']],
            ['slug' => 'banking', 'roman' => 'II', 'title' => 'Banking & Finance', 'short' => 'Commercial banking, corporate finance and asset management services.', 'icon' => '🏦', 'color' => '#1a4b8c', 'services' => ['Commercial banking', 'Corporate finance', 'Asset management', 'Project financing', 'Capital investment', 'Financial advisory']],
            ['slug' => 'oil-gas-energy', 'roman' => 'III', 'title' => 'Oil, Gas & Energy', 'short' => 'Exploration, substations, transmission systems and energy infrastructure.', 'icon' => '⚡', 'color' => '#7c1d1d', 'services' => ['Oil and gas exploration', 'Substations civil works', 'Electrical and mechanical engineering', 'Transmission systems construction', 'Energy infrastructure development']],
            ['slug' => 'mining', 'roman' => 'IV', 'title' => 'Mining & Industrial Operations', 'short' => 'Mineral exploration, aluminum and steel processing, industrial manufacturing.', 'icon' => '⛏️', 'color' => '#3d2b1f', 'services' => ['Mining and mineral exploration', 'Aluminum and steel processing', 'Industrial manufacturing and blending', 'Industrial equipment optimization', 'Machinery, plant, and track systems']],
            ['slug' => 'pharmaceuticals', 'roman' => 'V', 'title' => 'Pharmaceuticals', 'short' => 'Pharmaceutical manufacturing, distribution, and healthcare supply chain.', 'icon' => '💊', 'color' => '#1a6b4a', 'services' => ['Pharmaceutical manufacturing', 'Drug distribution', 'Healthcare supply chain', 'Medical equipment supply', 'Laboratory services']],
            ['slug' => 'logistics', 'roman' => 'VI', 'title' => 'Logistics, Shipping & Transportation', 'short' => 'Import and export logistics, shipping, aviation, ports and harbor management.', 'icon' => '🚢', 'color' => '#1e3a5f', 'services' => ['Import and export logistics', 'Shipping and navigation services', 'Aviation navigation services', 'Ports and harbor management', 'Multi-purpose car, truck, and bus terminals', 'Logistics and supply chain management']],
            ['slug' => 'agriculture', 'roman' => 'VII', 'title' => 'Agriculture & Agro-Processing', 'short' => 'Farming, food processing, cold storage, warehousing and agro value chain.', 'icon' => '🌾', 'color' => '#3d6b1a', 'services' => ['Farming and farm production', 'Food and crop processing', 'Edible processing and packaging', 'Fishing and cold storage facilities', 'Warehousing and storage systems']],
            ['slug' => 'marine', 'roman' => 'VIII', 'title' => 'Marine & Heavy Equipment Services', 'short' => 'Marine operations, earth-moving machinery, railroad and off-road equipment.', 'icon' => '⚓', 'color' => '#0d4f6b', 'services' => ['Marine services and operations', 'Off-road equipment lubrication', 'Earth-moving machinery services', 'Railroad systems support', 'Heavy equipment maintenance']],
            ['slug' => 'commercial', 'roman' => 'IX', 'title' => 'Commercial & Social Infrastructure', 'short' => 'Educational projects, hospitals, warehouses, tank farms and commercial courts.', 'icon' => '🏛️', 'color' => '#4a1a6b', 'services' => ['Educational development projects', 'Medical and hospital emergency centers', 'Warehouses and factory development', 'Tank farms and refineries', 'Commercial courts and multi-purpose facilities']],
        ];
    }

    public static function getSubsidiaries()
    {
        return [
            ['id' => '01', 'sector' => 'MINING', 'name' => 'Philbeilts Mining', 'desc' => 'Mineral exploration and processing across West Africa with state-of-the-art equipment and safety-first operations.', 'slug' => 'mining'],
            ['id' => '02', 'sector' => 'REAL ESTATE', 'name' => 'Philbeilts Construction', 'desc' => 'Civil engineering, highways, and design-build services for public and private sector infrastructure.', 'slug' => 'real-estate'],
            ['id' => '03', 'sector' => 'OIL & GAS', 'name' => 'Philbeilts Energy', 'desc' => 'Substation civil works, transmission and energy infrastructure development across Ghana and West Africa.', 'slug' => 'oil-gas-energy'],
            ['id' => '04', 'sector' => 'LOGISTICS', 'name' => 'Philbeilts Maritime', 'desc' => 'Ports, harbor management and multi-modal logistics connecting Ghana to global trade networks.', 'slug' => 'logistics'],
            ['id' => '05', 'sector' => 'AGRICULTURE', 'name' => 'Philbeilts Agro', 'desc' => 'Farm production, agro-processing, cold storage and warehousing from field to market.', 'slug' => 'agriculture'],
            ['id' => '06', 'sector' => 'BANKING', 'name' => 'Philbeilts Capital', 'desc' => 'Corporate finance, project financing and asset management for industrial growth and investment.', 'slug' => 'banking'],
            ['id' => '07', 'sector' => 'PHARMA', 'name' => 'Philbeilts Pharma', 'desc' => 'Pharmaceutical manufacturing and distribution supporting Ghana\'s healthcare infrastructure.', 'slug' => 'pharmaceuticals'],
        ];
    }
}
