<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info("エリア情報データの作成を開始します...");

        $json = file_get_contents(__DIR__ . '/data/areas.json');
        $areas = json_decode($json, true);

        $count = 0;
        foreach ($areas['area'] as $area) {
            Area::create($area);
            $count++;
        }
        $this->command->info("エリア情報データを{$count}件、作成しました。");
    }
}
