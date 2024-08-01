<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShopFood;

class ShopFoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info("店舗メニューデータの作成を開始します...");

        ShopFood::create([
            'shop_id' => 1,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);

        ShopFood::create([
            'shop_id' => 2,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 3,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 4,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 5,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 6,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 7,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 8,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 9,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 10,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 11,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 12,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 13,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 14,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 15,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 16,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 17,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 18,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 19,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);
        ShopFood::create([
            'shop_id' => 20,
            'images'  => [
                '0'   => [
                    'image'  => '/img/food/food1.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '1'   => [
                    'image'  => '/img/food/food2.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '2'   => [
                    'image'  => '/img/food/food3.png',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '3'   => [
                    'image'  => '/img/food/food4.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
                '4'   => [
                    'image'  => '/img/food/food5.jpg',
                    'caption'  => '料理説明。サンプルサンプルサンプルサンプル',
                ],
            ],
        ]);



        $this->command->info("店舗メニューデータを作成しました。");
    }
}
