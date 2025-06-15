<?php

namespace Database\Seeders;

use App\Models\Livery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LiverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $liveries = [
            [
                'name' => 'Racing Stripes Classic',
                'description' => 'A timeless racing livery featuring bold stripes in red and white. Perfect for sports cars and racing enthusiasts.',
                'image_path' => null, // Will use placeholder
                'price' => 49.99,
                'category' => 'racing',
                'featured' => true,
                'for_sale' => true,
                'tags' => 'racing,stripes,classic,red,white',
            ],
            [
                'name' => 'Neon Cyberpunk',
                'description' => 'Futuristic design with neon accents and cyberpunk aesthetics. Glowing elements and sharp geometric patterns.',
                'image_path' => null,
                'price' => 79.99,
                'category' => 'futuristic',
                'featured' => true,
                'for_sale' => true,
                'tags' => 'cyberpunk,neon,futuristic,geometric,glowing',
            ],
            [
                'name' => 'Vintage Military',
                'description' => 'Military-inspired camouflage pattern with weathered textures and authentic military markings.',
                'image_path' => null,
                'price' => 59.99,
                'category' => 'military',
                'featured' => false,
                'for_sale' => true,
                'tags' => 'military,camouflage,vintage,weathered,authentic',
            ],
            [
                'name' => 'Abstract Art Explosion',
                'description' => 'Vibrant abstract design with explosive colors and dynamic patterns. A true work of art on wheels.',
                'image_path' => null,
                'price' => 89.99,
                'category' => 'artistic',
                'featured' => false,
                'for_sale' => true,
                'tags' => 'abstract,art,colorful,vibrant,dynamic',
            ],
            [
                'name' => 'Stealth Black Ops',
                'description' => 'Matte black finish with subtle tactical elements. Perfect for those who prefer understated elegance.',
                'image_path' => null,
                'price' => 69.99,
                'category' => 'tactical',
                'featured' => false,
                'for_sale' => true,
                'tags' => 'stealth,black,tactical,matte,elegant',
            ],
            [
                'name' => 'Retro Wave Sunset',
                'description' => 'Synthwave-inspired design with gradient sunsets and retro grid patterns. Pure 80s nostalgia.',
                'image_path' => null,
                'price' => 74.99,
                'category' => 'retro',
                'featured' => true,
                'for_sale' => true,
                'tags' => 'retro,synthwave,80s,sunset,gradient,grid',
            ],
            [
                'name' => 'Custom Commission',
                'description' => 'Exclusive custom design created for a private client. Showcasing unique artistic vision and craftsmanship.',
                'image_path' => null,
                'price' => null,
                'category' => 'custom',
                'featured' => false,
                'for_sale' => false,
                'tags' => 'custom,exclusive,commission,unique,artistic',
            ],
            [
                'name' => 'Carbon Fiber Elite',
                'description' => 'Premium carbon fiber texture with metallic accents. Sophisticated design for luxury vehicles.',
                'image_path' => null,
                'price' => 99.99,
                'category' => 'luxury',
                'featured' => false,
                'for_sale' => true,
                'tags' => 'carbon,fiber,luxury,premium,metallic,sophisticated',
            ],
        ];

        foreach ($liveries as $livery) {
            Livery::create($livery);
        }
    }
}
