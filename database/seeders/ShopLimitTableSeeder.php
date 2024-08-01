<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShopLimit;

class ShopLimitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info("店舗リミットデータの作成を開始します...");

        $json = file_get_contents(__DIR__ . '/data/shop.limits.json');
        $limits = json_decode($json, true);

        $count = 0;
        foreach ($limits['shop_limits'] as $limit) {
            ShopLimit::create($limit);
            $count++;
        }

        $this->command->info("店舗リミットデータを{$count}件、作成しました。");
    }
}
