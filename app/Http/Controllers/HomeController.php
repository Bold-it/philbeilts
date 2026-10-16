<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\JobListing;
use App\Models\Industry;

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
        try {
            return Industry::active()->get()->map(fn($i) => [
                'slug'      => $i->slug,
                'roman'     => $i->roman,
                'title'     => $i->title,
                'short'     => $i->short,
                'icon'      => $i->icon,
                'color'     => $i->color,
                'image_url' => $i->image_url,
                'services'  => $i->services,
            ])->toArray();
        } catch (\Exception $e) {
            return [];
        }
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
