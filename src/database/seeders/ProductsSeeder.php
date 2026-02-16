<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

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
                'price' => 1500,
                'brand' => 'Rolax',
                'product_description' => 'スタイリッシュなデザインのメンズ腕時計',
                'image' => 'Armani+Mens+Clock.png',
                'condition' => '良好',
            ],
            [
                'product_name' => 'HDD',
                'brand' => '西芝',
                'price' => 5000,
                'product_description' => '高速で信頼性の高いハードディスク',
                'image' => 'HDD+Hard+Disk.png',
                'condition' => '目立った傷や汚れなし',
            ],
            [
                'product_name' => '玉ねぎ３束',
                'price' => 300,
                'brand' => 'なし',
                'product_description' => '新鮮な玉ねぎ３束のセット',
                'image' => 'iLoveIMG+d.png',
                'condition' => 'やや傷や汚れあり',
            ],
            [
                'product_name' => '革靴',
                'price' => 4000,
                'brand' => '',
                'product_description' => 'クラッシックなデザインの革靴',
                'image' => 'Leather+Shoes+Product+Photo.png',
                'condition' => '状態が悪い',
            ],
            [
                'product_name' => 'ノートPC',
                'price' => 45000,
                'brand' => '',
                'product_description' => '高性能なノートパソコン',
                'image' => 'Living+Room+Laptop.png',
                'condition' => '良好',
            ],
            [
                'product_name' => 'マイク',
                'price' => 8000,
                'brand' => 'なし',
                'product_description' => '高品質のレコーディング用マイク',
                'image' => 'Music+Mic+4632231.png',
                'condition' => '目立った傷や汚れなし',
            ],
            [
                'product_name' => 'ショルダーバッグ',
                'price' => 3500,
                'brand' => '',
                'product_description' => 'おしゃれなショルダーバッグ',
                'image' => 'Purse+fashion+pocket.png',
                'condition' => 'やや傷や汚れあり',
            ],
            [
                'product_name' => 'タンブラー',
                'price' => 500,
                'brand' => 'なし',
                'product_description' => 'おしゃれなショルダーバッグ',
                'image' => 'Tumbler+souvenir.png',
                'condition' => '状態が悪い',
            ],
            [
                'product_name' => 'コーヒーミル',
                'price' => 4000,
                'brand' => 'Starbacks',
                'product_description' => '手動のコーヒーミル',
                'image' => 'Waitress+with+Coffee+Grinder.png',
                'condition' => '良好',
            ],
            [
                'product_name' => 'メイクセット',
                'price' => 2500,
                'brand' => '',
                'product_description' => '便利なメイクアップセット',
                'image' => '外出メイクアップセット.png',
                'condition' => '目立った傷や汚れなし',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
