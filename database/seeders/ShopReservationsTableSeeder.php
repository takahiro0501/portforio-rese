<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShopReservation;
use Illuminate\Support\Arr;

class ShopReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info("店舗予約データの作成を開始します...");
        $array = [1, 2, 3, 4, 5];
        ShopReservation::create([
            'shop_id' => 1,
            'data'  => [
                'r20240701'   => Arr::random($array),
                'r20240703'   => Arr::random($array) ,
                'r20240708'   => Arr::random($array) ,
                'r20240711'   => Arr::random($array) ,
                'r20240712'   => Arr::random($array) ,
                'r20240713'   => Arr::random($array) ,
                'r20240720'   => Arr::random($array) ,
                'r20240722'   => Arr::random($array) ,
                'r20240723'   => Arr::random($array) ,
                'r20240726'   => Arr::random($array) ,
                'r20240728'   => Arr::random($array) ,
                'r20240730'   => Arr::random($array) ,
                'r20240801'   => Arr::random($array) ,
                'r20240803'   => Arr::random($array) ,
                'r20240808'   => Arr::random($array) ,
                'r20240811'   => Arr::random($array) ,
                'r20240812'   => Arr::random($array) ,
                'r20240813'   => Arr::random($array) ,
                'r20240820'   => Arr::random($array) ,
                'r20240822'   => Arr::random($array) ,
                'r20240823'   => Arr::random($array) ,
                'r20240826'   => Arr::random($array) ,
                'r20240828'   => Arr::random($array) ,
                'r20240830'   => Arr::random($array) ,
                'r20240901'   => Arr::random($array),
                'r20240903'   => Arr::random($array) ,
                'r20240908'   => Arr::random($array) ,
                'r20240911'   => Arr::random($array) ,
                'r20240912'   => Arr::random($array) ,
                'r20240913'   => Arr::random($array) ,
                'r20240920'   => Arr::random($array) ,
                'r20240922'   => Arr::random($array) ,
                'r20240923'   => Arr::random($array) ,
                'r20240926'   => Arr::random($array) ,
                'r20240928'   => Arr::random($array) ,
                'r20240930'   => Arr::random($array) ,
                'r20241001'   => Arr::random($array) ,
                'r20241003'   => Arr::random($array) ,
                'r20241008'   => Arr::random($array) ,
                'r20241011'   => Arr::random($array) ,
                'r20241012'   => Arr::random($array) ,
                'r20241013'   => Arr::random($array) ,
                'r20241020'   => Arr::random($array) ,
                'r20241022'   => Arr::random($array) ,
                'r20241023'   => Arr::random($array) ,
                'r20241026'   => Arr::random($array) ,
                'r20241028'   => Arr::random($array) ,
                'r20241030'   => Arr::random($array) ,
                'r20241101'   => Arr::random($array),
                'r20241103'   => Arr::random($array) ,
                'r20241108'   => Arr::random($array) ,
                'r20241111'   => Arr::random($array) ,
                'r20241112'   => Arr::random($array) ,
                'r20241113'   => Arr::random($array) ,
                'r20241120'   => Arr::random($array) ,
                'r20241122'   => Arr::random($array) ,
                'r20241123'   => Arr::random($array) ,
                'r20241126'   => Arr::random($array) ,
                'r20241128'   => Arr::random($array) ,
                'r20241130'   => Arr::random($array) ,
                'r20241201'   => Arr::random($array) ,
                'r20241203'   => Arr::random($array) ,
                'r20241208'   => Arr::random($array) ,
                'r20241211'   => Arr::random($array) ,
                'r20241212'   => Arr::random($array) ,
                'r20241213'   => Arr::random($array) ,
                'r20241220'   => Arr::random($array) ,
                'r20241222'   => Arr::random($array) ,
                'r20241223'   => Arr::random($array) ,
                'r20241226'   => Arr::random($array) ,
                'r20241228'   => Arr::random($array) ,
                'r20241230'   => Arr::random($array) ,
            ],
        ]);

        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        ShopReservation::create([
            'shop_id' => 2,
            'data'  => [
                'r20240701'   => Arr::random($array),
                'r20240703'   => Arr::random($array) ,
                'r20240708'   => Arr::random($array) ,
                'r20240711'   => Arr::random($array) ,
                'r20240712'   => Arr::random($array) ,
                'r20240713'   => Arr::random($array) ,
                'r20240720'   => Arr::random($array) ,
                'r20240722'   => Arr::random($array) ,
                'r20240723'   => Arr::random($array) ,
                'r20240726'   => Arr::random($array) ,
                'r20240728'   => Arr::random($array) ,
                'r20240730'   => Arr::random($array) ,
                'r20240801'   => Arr::random($array) ,
                'r20240803'   => Arr::random($array) ,
                'r20240808'   => Arr::random($array) ,
                'r20240811'   => Arr::random($array) ,
                'r20240812'   => Arr::random($array) ,
                'r20240813'   => Arr::random($array) ,
                'r20240820'   => Arr::random($array) ,
                'r20240822'   => Arr::random($array) ,
                'r20240823'   => Arr::random($array) ,
                'r20240826'   => Arr::random($array) ,
                'r20240828'   => Arr::random($array) ,
                'r20240830'   => Arr::random($array) ,
                'r20240901'   => Arr::random($array),
                'r20240903'   => Arr::random($array) ,
                'r20240908'   => Arr::random($array) ,
                'r20240911'   => Arr::random($array) ,
                'r20240912'   => Arr::random($array) ,
                'r20240913'   => Arr::random($array) ,
                'r20240920'   => Arr::random($array) ,
                'r20240922'   => Arr::random($array) ,
                'r20240923'   => Arr::random($array) ,
                'r20240926'   => Arr::random($array) ,
                'r20240928'   => Arr::random($array) ,
                'r20240930'   => Arr::random($array) ,
                'r20241001'   => Arr::random($array) ,
                'r20241003'   => Arr::random($array) ,
                'r20241008'   => Arr::random($array) ,
                'r20241011'   => Arr::random($array) ,
                'r20241012'   => Arr::random($array) ,
                'r20241013'   => Arr::random($array) ,
                'r20241020'   => Arr::random($array) ,
                'r20241022'   => Arr::random($array) ,
                'r20241023'   => Arr::random($array) ,
                'r20241026'   => Arr::random($array) ,
                'r20241028'   => Arr::random($array) ,
                'r20241030'   => Arr::random($array) ,
                'r20241101'   => Arr::random($array),
                'r20241103'   => Arr::random($array) ,
                'r20241108'   => Arr::random($array) ,
                'r20241111'   => Arr::random($array) ,
                'r20241112'   => Arr::random($array) ,
                'r20241113'   => Arr::random($array) ,
                'r20241120'   => Arr::random($array) ,
                'r20241122'   => Arr::random($array) ,
                'r20241123'   => Arr::random($array) ,
                'r20241126'   => Arr::random($array) ,
                'r20241128'   => Arr::random($array) ,
                'r20241130'   => Arr::random($array) ,
                'r20241201'   => Arr::random($array) ,
                'r20241203'   => Arr::random($array) ,
                'r20241208'   => Arr::random($array) ,
                'r20241211'   => Arr::random($array) ,
                'r20241212'   => Arr::random($array) ,
                'r20241213'   => Arr::random($array) ,
                'r20241220'   => Arr::random($array) ,
                'r20241222'   => Arr::random($array) ,
                'r20241223'   => Arr::random($array) ,
                'r20241226'   => Arr::random($array) ,
                'r20241228'   => Arr::random($array) ,
                'r20241230'   => Arr::random($array) ,

            ],
        ]);

        $array = [1, 2, 3, 4, 5];
        ShopReservation::create([
            'shop_id' => 3,
            'data'  => [
                'r20240701'   => Arr::random($array),
                'r20240703'   => Arr::random($array) ,
                'r20240708'   => Arr::random($array) ,
                'r20240711'   => Arr::random($array) ,
                'r20240712'   => Arr::random($array) ,
                'r20240713'   => Arr::random($array) ,
                'r20240720'   => Arr::random($array) ,
                'r20240722'   => Arr::random($array) ,
                'r20240723'   => Arr::random($array) ,
                'r20240726'   => Arr::random($array) ,
                'r20240728'   => Arr::random($array) ,
                'r20240730'   => Arr::random($array) ,
                'r20240801'   => Arr::random($array) ,
                'r20240803'   => Arr::random($array) ,
                'r20240808'   => Arr::random($array) ,
                'r20240811'   => Arr::random($array) ,
                'r20240812'   => Arr::random($array) ,
                'r20240813'   => Arr::random($array) ,
                'r20240820'   => Arr::random($array) ,
                'r20240822'   => Arr::random($array) ,
                'r20240823'   => Arr::random($array) ,
                'r20240826'   => Arr::random($array) ,
                'r20240828'   => Arr::random($array) ,
                'r20240830'   => Arr::random($array) ,
                'r20240901'   => Arr::random($array),
                'r20240903'   => Arr::random($array) ,
                'r20240908'   => Arr::random($array) ,
                'r20240911'   => Arr::random($array) ,
                'r20240912'   => Arr::random($array) ,
                'r20240913'   => Arr::random($array) ,
                'r20240920'   => Arr::random($array) ,
                'r20240922'   => Arr::random($array) ,
                'r20240923'   => Arr::random($array) ,
                'r20240926'   => Arr::random($array) ,
                'r20240928'   => Arr::random($array) ,
                'r20240930'   => Arr::random($array) ,
                'r20241001'   => Arr::random($array) ,
                'r20241003'   => Arr::random($array) ,
                'r20241008'   => Arr::random($array) ,
                'r20241011'   => Arr::random($array) ,
                'r20241012'   => Arr::random($array) ,
                'r20241013'   => Arr::random($array) ,
                'r20241020'   => Arr::random($array) ,
                'r20241022'   => Arr::random($array) ,
                'r20241023'   => Arr::random($array) ,
                'r20241026'   => Arr::random($array) ,
                'r20241028'   => Arr::random($array) ,
                'r20241030'   => Arr::random($array) ,
                'r20241101'   => Arr::random($array),
                'r20241103'   => Arr::random($array) ,
                'r20241108'   => Arr::random($array) ,
                'r20241111'   => Arr::random($array) ,
                'r20241112'   => Arr::random($array) ,
                'r20241113'   => Arr::random($array) ,
                'r20241120'   => Arr::random($array) ,
                'r20241122'   => Arr::random($array) ,
                'r20241123'   => Arr::random($array) ,
                'r20241126'   => Arr::random($array) ,
                'r20241128'   => Arr::random($array) ,
                'r20241130'   => Arr::random($array) ,
                'r20241201'   => Arr::random($array) ,
                'r20241203'   => Arr::random($array) ,
                'r20241208'   => Arr::random($array) ,
                'r20241211'   => Arr::random($array) ,
                'r20241212'   => Arr::random($array) ,
                'r20241213'   => Arr::random($array) ,
                'r20241220'   => Arr::random($array) ,
                'r20241222'   => Arr::random($array) ,
                'r20241223'   => Arr::random($array) ,
                'r20241226'   => Arr::random($array) ,
                'r20241228'   => Arr::random($array) ,
                'r20241230'   => Arr::random($array) ,

            ],
        ]);

        ShopReservation::create([
            'shop_id' => 4,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 5,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 6,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 7,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 8,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 9,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 10,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 11,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 12,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 13,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 14,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 15,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 16,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 17,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 18,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 19,
            'data'  => [
            ],
        ]);
        ShopReservation::create([
            'shop_id' => 20,
            'data'  => [
            ],
        ]);
    }
}
