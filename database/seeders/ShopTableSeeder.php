<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shop;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info("店舗情報データの作成を開始します...");

        $json = file_get_contents(__DIR__ . '/data/shops.json');
        $shops = json_decode($json, true);

        $count = 0;
        foreach ($shops['shops'] as $shop) {
            Shop::create($shop);
            $count++;
        }

        $this->command->info("店舗情報データを{$count}件、作成しました。");
    }
}
