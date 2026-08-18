<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\JobListing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create or update Admin User
        User::updateOrCreate(
            ['email' => 'admin@philbeiltsgroup.com'],
            [
                'name' => 'Philbeilts Admin',
                'password' => Hash::make('Philbeilts@2026!'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Initial Blog/News Posts
        $posts = [
            [
                'title' => 'Philbeilts signs strategic partnership for West African logistics corridor',
                'slug' => 'west-african-logistics-corridor',
                'category' => 'PARTNERSHIPS',
                'read_time' => '4 min read',
                'excerpt' => 'The Group announces a landmark logistics agreement spanning five West African nations, establishing critical supply chain infrastructure to support regional trade.',
                'content' => "<p>Philbeilts Industrial Group of Companies Ltd is proud to announce the formal execution of a multi-lateral logistics agreement aimed at accelerating regional integration and cross-border commercial connectivity across West Africa.</p><p>The project will interconnect specialized transit hubs, cold storage distribution centers, and multimodal cargo terminals between Ghana, Côte d'Ivoire, Burkina Faso, Togo, and Benin. As part of this comprehensive initiative, Philbeilts Maritime and Logistics division will oversee the construction and operational deployment of standardized digital clearance infrastructure at key corridor waypoints.</p><p>\"This partnership exemplifies our core mission: providing foundational industrial architecture that powers sustainable economic growth,\" said the Group Managing Director. \"By removing logistical bottlenecks, we unlock trade capacity for thousands of producers, farmers, and manufacturers across the ECOWAS region.\"</p>",
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Mining division reports record uptime through new equipment optimization program',
                'slug' => 'mining-equipment-uptime',
                'category' => 'OPERATIONS',
                'read_time' => '3 min read',
                'excerpt' => 'Philbeilts Mining achieves 97% operational uptime following the rollout of a comprehensive equipment maintenance and optimization initiative.',
                'content' => "<p>Following the successful implementation of its 2025–2026 Heavy Equipment Reliability Framework, Philbeilts Mining has registered a historical peak in continuous operational uptime, reaching 97.4% across all active concession sites in the Western and Ashanti regions.</p><p>The program integrates predictive telemetry, specialized lubrication protocols developed in partnership with leading global industrial suppliers, and round-the-clock preventative servicing schedules. The result has been a significant reduction in unscheduled downtime, direct cost savings, and enhanced workplace safety metrics.</p><p>Philbeilts Industrial Group continues to invest in state-of-the-art earth-moving machinery, processing infrastructure, and environmental containment protocols that comply with both Ghanaian regulatory frameworks and international best practices.</p>",
                'is_published' => true,
                'published_at' => now()->subWeeks(3),
            ],
            [
                'title' => 'Group breaks ground on cross-regional highway expansion serving four districts',
                'slug' => 'highway-expansion-groundbreaking',
                'category' => 'INFRASTRUCTURE',
                'read_time' => '5 min read',
                'excerpt' => 'A major highway construction project connecting four districts in Ghana has commenced, with Philbeilts Construction leading civil engineering operations.',
                'content' => "<p>Civic leaders, government officials, and community stakeholders joined executives from Philbeilts Industrial Group for the official sod-cutting ceremony marking the start of the 68-kilometer multi-district highway modernisation project.</p><p>Awarded to Philbeilts Construction, the contract entails dual-carriageway paving, modern drainage systems, reinforced concrete bridges, and solar-powered street lighting infrastructure. The corridor links agricultural production zones directly to commercial markets and urban centers, slashing average transit times by over 40%.</p><p>Civil works are scheduled to progress across three synchronized phases, with over 600 direct and indirect local employment opportunities generated throughout the construction lifecycle.</p>",
                'is_published' => true,
                'published_at' => now()->subMonths(2),
            ],
        ];

        foreach ($posts as $postData) {
            Post::updateOrCreate(['slug' => $postData['slug']], $postData);
        }

        // 3. Initial Job Openings
        $jobs = [
            [
                'title' => 'Senior Civil Engineer',
                'department' => 'CONSTRUCTION',
                'location' => 'Accra, GH',
                'employment_type' => 'Full-Time',
                'description' => 'Lead technical design oversight, structural integrity validations, and on-site contractor coordination for commercial and highway development projects.',
                'requirements' => 'B.Sc/M.Sc in Civil Engineering, 7+ years proven experience in large-scale infrastructure projects, registered member of the Ghana Institution of Engineering (GhIE).',
                'is_active' => true,
            ],
            [
                'title' => 'Director of Operations',
                'department' => 'MINING',
                'location' => 'Accra, GH',
                'employment_type' => 'Full-Time',
                'description' => 'Oversee daily mining concessions, equipment deployment, safety compliance, and operational throughput for mineral extraction units.',
                'requirements' => '10+ years executive or operational leadership in mining and minerals processing with a strong track record of safety governance.',
                'is_active' => true,
            ],
            [
                'title' => 'Treasury Analyst',
                'department' => 'CAPITAL',
                'location' => 'Accra, GH',
                'employment_type' => 'Full-Time',
                'description' => 'Manage corporate liquidity, financial modelling, foreign exchange risk mitigation, and project debt structuring for Group ventures.',
                'requirements' => 'Degree in Finance, Economics, or Accounting; professional certification (ACCA, CA, CFA level II+) and 4+ years corporate treasury experience.',
                'is_active' => true,
            ],
            [
                'title' => 'Logistics Manager',
                'department' => 'MARITIME',
                'location' => 'Tema, GH',
                'employment_type' => 'Full-Time',
                'description' => 'Direct port transit operations, vessel clearance, warehousing workflows, and freight forwarding logistics at Tema harbor.',
                'requirements' => 'Degree in Supply Chain Management or Maritime Logistics; 5+ years experience handling international freight and customs procedures.',
                'is_active' => true,
            ],
            [
                'title' => 'Pharmaceutical Chemist',
                'department' => 'PHARMA',
                'location' => 'Accra, GH',
                'employment_type' => 'Full-Time',
                'description' => 'Supervise pharmaceutical formulations, quality assurance testing, and regulatory submissions in compliance with FDA Ghana standards.',
                'requirements' => 'B.Pharm or Master’s in Industrial Chemistry, registered with the Pharmacy Council of Ghana, 3+ years experience in GMP manufacturing.',
                'is_active' => true,
            ],
            [
                'title' => 'Agricultural Operations Officer',
                'department' => 'AGRO',
                'location' => 'Kumasi, GH',
                'employment_type' => 'Full-Time',
                'description' => 'Manage agro-processing facility lines, outgrower schemes, and post-harvest storage management systems.',
                'requirements' => 'Degree in Agronomy, Agricultural Engineering or Agribusiness; 4+ years operational supervisory experience in commercial farming or processing.',
                'is_active' => true,
            ],
        ];

        foreach ($jobs as $jobData) {
            JobListing::updateOrCreate(['title' => $jobData['title']], $jobData);
        }
    }
}
