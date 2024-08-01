<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info("ジャンル情報データの作成を開始します...");

        $json = file_get_contents(__DIR__ . '/data/genres.json');
        $genres = json_decode($json, true);

        $count = 0;
        foreach ($genres['genre'] as $genre) {
            Genre::create($genre);
            $count++;
        }
        $this->command->info("ジャンル情報データを{$count}件、作成しました。");
    }
}
