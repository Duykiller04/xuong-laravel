<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();

        ProductVariant::query()->truncate();
        ProductGallery::query()->truncate();
        DB::table('product_tag')->truncate();
        Product::query()->truncate();
        ProductSize::query()->truncate();
        ProductColor::query()->truncate();
        Tag::query()->truncate();


        Tag::factory(15)->create();
        
        foreach (['S', 'M', 'L', 'XL', 'XXL'] as $item) {
            ProductSize::query()->create([
                'name' => $item
            ]);
        }
        
        foreach (['#0000FF', '#FF00FF', '#33CCFF', '#FF0033', '#00EE00'] as $item) {
            ProductColor::query()->create([
                'name' => $item
            ]);
        }

        for ($i=0; $i < 1000; $i++) {
            $name = fake()->text(100);
            Product::query()->create([
                'catalogue_id' => rand(2, 7),
                'name' => $name,
                'slug' => Str::slug($name) . '-' . Str::random(8),
                'sku' => Str::random(8) . $i,
                'img_thumbnail' => 'https://s.rfi.fr/media/display/7d1baf26-131a-11ea-a1a4-005056a99247/w:1280/p:1x1/2016-04-11t120553z_1694381677_tb3ec4b0xlieo_rtrmadp_3_soccer-euro-preview_0.jpg',
                'price_regular' => 600000,
                'price_sale' => 499000,
            ]);
        }

        for ($i=1; $i < 1001; $i++) {
            ProductGallery::query()->insert([
                [
                    'product_id' => $i,
                    'image' => 'https://s.rfi.fr/media/display/7d1baf26-131a-11ea-a1a4-005056a99247/w:1280/p:1x1/2016-04-11t120553z_1694381677_tb3ec4b0xlieo_rtrmadp_3_soccer-euro-preview_0.jpg',
                ],
                [
                    'product_id' => $i,
                    'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXNSRqX39KJQKcm-n7DmTlxp6QMmKpyc0nwg&s'
                ],
            ]);
        }

        for ($i=1; $i < 1001; $i++) {
            DB::table('product_tag')->insert([
                [
                    'product_id' =>  $i,
                    'tag_id' => rand(1, 8)
                ],
                [
                    'product_id' =>  $i,
                    'tag_id' => rand(9, 15)
                ]
            ]);
        }

        for($productID = 1; $productID < 1001; $productID++){
            $data = [];
            for($sizeID = 1; $sizeID < 6; $sizeID++){
                for($colorID = 1; $colorID < 6; $colorID++){
                    $data[] = [
                        'product_id' => $productID,
                        'product_size_id' => $sizeID,
                        'product_color_id'=> $colorID,
                        'quantity' => 100,
                        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXNSRqX39KJQKcm-n7DmTlxp6QMmKpyc0nwg&s',
                    ];
                }
            }

            DB::table('product_variants')->insert($data);

        }
    }
}
