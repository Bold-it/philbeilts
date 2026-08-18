<?php
namespace App\Http\Controllers;
class ProjectsController extends Controller {
    public function index() {
        $projects = [
            ['id' => '01', 'title' => 'Tema Industrial Enclave Phase I', 'category' => 'Real Estate & Infrastructure', 'location' => 'Tema, Ghana', 'status' => 'In Progress', 'year' => '2024–2026', 'desc' => 'Development of a 200-acre industrial hub featuring manufacturing zones, logistics corridors, and commercial facilities in Tema, Ghana.'],
            ['id' => '02', 'title' => 'Volta River Energy Substation', 'category' => 'Oil, Gas & Energy', 'location' => 'Eastern Region, Ghana', 'status' => 'Completed', 'year' => '2023–2024', 'desc' => 'Construction of a high-capacity energy substation to support power transmission across four districts in Eastern Ghana.'],
            ['id' => '03', 'title' => 'West African Logistics Corridor', 'category' => 'Logistics & Transportation', 'location' => 'Multi-national', 'status' => 'Planning', 'year' => '2026–2028', 'desc' => 'A cross-border logistics network linking Ghana, Côte d\'Ivoire, Burkina Faso, Togo, and Benin for seamless regional trade.'],
            ['id' => '04', 'title' => 'Ashanti Region Highway Expansion', 'category' => 'Real Estate & Infrastructure', 'location' => 'Kumasi, Ghana', 'status' => 'In Progress', 'year' => '2025–2027', 'desc' => 'Multi-lane highway construction connecting four districts in the Ashanti Region, improving transportation for over 500,000 residents.'],
            ['id' => '05', 'title' => 'National Cold Chain Agricultural Hub', 'category' => 'Agriculture & Agro-Processing', 'location' => 'Accra & Kumasi, Ghana', 'status' => 'In Progress', 'year' => '2025–2026', 'desc' => 'State-of-the-art cold storage and agro-processing facilities reducing post-harvest losses and supporting food security in Ghana.'],
            ['id' => '06', 'title' => 'Tema Port Container Terminal', 'category' => 'Marine & Logistics', 'location' => 'Tema, Ghana', 'status' => 'Planning', 'year' => '2026–2029', 'desc' => 'Expansion and modernization of container handling capacity at Tema Port to support Ghana\'s growing import-export volumes.'],
        ];
        return view('projects', compact('projects'));
    }
}
