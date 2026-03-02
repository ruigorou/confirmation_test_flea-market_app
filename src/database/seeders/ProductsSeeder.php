<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'product_name' => '腕時計',
                'price' =>  1500,
                'brand' => 'Rolax',
                'product_description' => 'スタイリッシュなデザインのメンズ腕時計',
                'image' => 'ArmaniMensClock.jpg',
                'condition' => '良好',
            ],
            [
                'product_name' => 'HDD',
                'brand' => '西芝',
                'price' => 5000,
                'product_description' => '高速で信頼性の高いハードディスク',
                'image' => 'HDDHardDisk.jpg',
                'condition' => '目立った傷や汚れなし',
            ],
            [
                'product_name' => '玉ねぎ３束',
                'price' => 300,
                'brand' => 'なし',
                'product_description' => '新鮮な玉ねぎ３束のセット',
                'image' => 'iLoveIMGd.jpg',
                'condition' => 'やや傷や汚れあり',
            ],
            [
                'product_name' => '革靴',
                'price' => 4000,
                'brand' => '',
                'product_description' => 'クラッシックなデザインの革靴',
                'image' => 'LeatherShoesProductPhoto.jpg',
                'condition' => '状態が悪い',
            ],
            [
                'product_name' => 'ノートPC',
                'price' => 45000,
                'brand' => '',
                'product_description' => '高性能なノートパソコン',
                'image' => 'LivingRoomLaptop.jpg',
                'condition' => '良好',
            ],
            [
                'product_name' => 'マイク',
                'price' => 8000,
                'brand' => 'なし',
                'product_description' => '高品質のレコーディング用マイク',
                'image' => 'MusicMic4632231.jpg',
                'condition' => '目立った傷や汚れなし',
            ],
            [
                'product_name' => 'ショルダーバッグ',
                'price' => 3500,
                'brand' => '',
                'product_description' => 'おしゃれなショルダーバッグ',
                'image' => 'Pursefashionpocket.jpg',
                'condition' => 'やや傷や汚れあり',
            ],
            [
                'product_name' => 'タンブラー',
                'price' => 500,
                'brand' => 'なし',
                'product_description' => 'おしゃれなショルダーバッグ',
                'image' => 'Tumblersouvenir.jpg',
                'condition' => '状態が悪い',
            ],
            [
                'product_name' => 'コーヒーミル',
                'price' => 4000,
                'brand' => 'Starbacks',
                'product_description' => '手動のコーヒーミル',
                'image' => 'WaitresswithCoffeeGrinder.jpg',
                'condition' => '良好',
            ],
            [
                'product_name' => 'メイクセット',
                'price' => 2500,
                'brand' => '',
                'product_description' => '便利なメイクアップセット',
                'image' => '外出メイクアップセット.jpg',
                'condition' => '目立った傷や汚れなし',
            ],
        ];

        DB::table('products')->insert($products);
        $product_categories = [
            [
                'product_id' => 1,
                'product_category_id' => [1, 5]
            ],
            [
                'product_id' => 2,
                'product_category_id' => [2]
            ],
            [
                'product_id' => 3,
                'product_category_id' => [10]
            ],
            [
                'product_id' => 4,
                'product_category_id' => [1, 5]
            ],
            [
                'product_id' => 5,
                'product_category_id' => [2]
            ],
            [
                'product_id' => 6,
                'product_category_id' => [2]
            ],
            [
                'product_id' => 7,
                'product_category_id' => [1, 4]
            ],
            [
                'product_id' => 8,
                'product_category_id' => [5]
            ],
            [
                'product_id' => 9,
                'product_category_id' => [3]
            ],
            [
                'product_id' => 10,
                'product_category_id' => [4, 6]
            ]
        ];

        foreach($product_categories as $product_category) {
            $product = Product::find($product_category['product_id']);
            if ($product) {
                $product->product_categories()->attach($product_category['product_category_id']);
            }
        }
    }
}
