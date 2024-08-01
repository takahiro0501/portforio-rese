<?php

namespace App\Lib;

use Carbon\Carbon;


class My_func
{
    public static function dayWeekJP(int $num)
    {
        switch ($num) {
            case 0:
                return '日';
            case 1:
                return '月';
            case 2:
                return '火';
            case 3:
                return '水';
            case 4:
                return '木';
            case 5:
                return '金';
            case 6:
                return '土';
        }
    }

    public static function getReservationArray($shopReservationAll)
    {
        //今日の日付取得
        $dt = Carbon::now();
        //10日後の日付取得
        $tenWeek = (Carbon::now()->addDay(10));
        $result = array();
        //10日後までの店舗ごとの予約情報データの作成
        foreach($shopReservationAll as $shopData){
            $result = array_merge($result,array('s'.$shopData->id => []));
            while(!$tenWeek->isSameDay($dt)){
                if(isset($shopData->shopReservation->data)){
                    if(array_key_exists('r'.$dt->format('Ymd'),$shopData->shopReservation->data)){
                        if($shopData->shopLimit->limit_seat <= $shopData->shopReservation->data['r'.$dt->format('Ymd')]){
                            $result['s'.$shopData->id] += array(
                                $dt->format('n/j').'('.My_func::dayWeekJP($dt->dayOfWeek).')' => '×'
                            );
                        }elseif($shopData->shopLimit->limit_seat - $shopData->shopReservation->data['r'.$dt->format('Ymd')] == 1){
                            $result['s'.$shopData->id] += array(
                                $dt->format('n/j').'('.My_func::dayWeekJP($dt->dayOfWeek).')' => 'TEL'
                            );
                        }elseif($shopData->shopLimit->limit_seat - $shopData->shopReservation->data['r'.$dt->format('Ymd')] == 2){
                            $result['s'.$shopData->id] += array(
                                $dt->format('n/j').'('.My_func::dayWeekJP($dt->dayOfWeek).')' => '△'
                            );
                        }else{
                            $result['s'.$shopData->id] += array(
                                $dt->format('n/j').'('.My_func::dayWeekJP($dt->dayOfWeek).')' => '◎'
                            );
                        }
                    }else{
                            $result['s'.$shopData->id] += array(
                                $dt->format('n/j').'('.My_func::dayWeekJP($dt->dayOfWeek).')' => '◎'
                            );
                    }
                }else{
                    $result['s'.$shopData->id] += array(
                        $dt->format('n/j').'('.My_func::dayWeekJP($dt->dayOfWeek).')' => '◎'
                    );
                }
                $dt->addDay();
            }
            $dt = Carbon::now();
        }
        return $result;
    }
}
