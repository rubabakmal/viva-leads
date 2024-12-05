<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'service_name' => 'Plumbing and Heating',
                'description' => 'Professional plumbing and heating services.',
                'expertise' => 'Plumbing installation, repairs, heating system maintenance.',
                'image' => 'Plumbing and Heating.jpg',
                'status' => 'active',
            ],
            [
                'service_name' => 'Joinery',
                'description' => 'Expert joinery services for custom furniture and woodwork.',
                'expertise' => 'Custom woodwork, repairs, installations.',
                'image' => 'Joineryimg.jpeg',
                'status' => 'active',
            ],
            [
                'service_name' => 'Kitchen',
                'description' => 'Complete kitchen remodeling and installations.',
                'expertise' => 'Cabinet installation, countertop replacement, kitchen design.',
                'image' => 'Kitchen.jpg',
                'status' => 'active',
            ],
            [
                'service_name' => 'Bathrooms',
                'description' => 'Bathroom renovations and plumbing services.',
                'expertise' => 'Tile work, plumbing, fixtures installation.',
                'image' => 'Bathroom.jpg',
                'status' => 'active',
            ],
            [
                'service_name' => 'PVC Windows and Doors',
                'description' => 'High-quality PVC windows and doors installation.',
                'expertise' => 'Energy-efficient installations, custom sizing.',
                'image' => 'PVC Windows and Doors.jpg',
                'status' => 'active',
            ],
            [
                'service_name' => 'Electrics Service',
                'description' => 'Expert electrical services for homes and offices.',
                'expertise' => 'Wiring, installations, repairs.',
                'image' => 'Electrics Service.jpeg',
                'status' => 'active',
            ],
            [
                'service_name' => 'CCTV',
                'description' => 'CCTV installation and maintenance for your security needs.',
                'expertise' => 'Residential and commercial security systems.',
                'image' => 'CCTV.jpg',
                'status' => 'active',
            ],
            [
                'service_name' => 'Brick Work',
                'description' => 'Reliable and skilled brickwork for construction and renovations.',
                'expertise' => 'Walls, pathways, structures.',
                'image' => 'Brick Work.jpg',
                'status' => 'active',
            ],
            [
                'service_name' => 'Plastering',
                'description' => 'High-quality plastering services for smooth finishes.',
                'expertise' => 'Interior and exterior plastering.',
                'image' => 'Plastering.jpg',
                'status' => 'active',
            ],
            [
                'service_name' => 'Carpet and Flooring',
                'description' => 'Expert carpet and flooring installation and repair services.',
                'expertise' => 'Custom carpets, hardwood, tile, and vinyl flooring.',
                'image' => 'Carpet and Flooring.jpg',
                'status' => 'active',
            ],
        ];

        foreach ($services as $service) {
            // Copy images from `public/assets/imgs` to `storage/app/public/services`
            $sourcePath = public_path('assets/imgs/' . $service['image']);
            $destinationPath = 'services/' . $service['image'];

            // Ensure the source image exists
            if (file_exists($sourcePath)) {
                // Store the image in Laravel's storage (public disk)
                Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath));

                // Update the image path in the service array
                $service['image'] = $destinationPath;
            } else {
                // Handle missing files (optional: log an error or use a default image)
                $service['image'] = null;
            }

            // Insert the service data into the database
            DB::table('services')->insert([
                'service_name' => $service['service_name'],
                'description' => $service['description'],
                'expertise' => $service['expertise'],
                'image' => $service['image'], // Saved path
                'status' => $service['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
