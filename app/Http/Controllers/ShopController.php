<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Favorite;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\ShopLimit;
use App\Models\ShopReservation;
use App\Models\User;
use App\Models\UserReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::with(['area','genre'])->get();
        $shopReservationAll = Shop::with(['shopReservation','shopLimit'])->get();
        $areas = Area::all();
        $genres = Genre::all();
        $user = Auth::user();
        $favorite = null;
        if($user){
            $favorite = Favorite::where('user_id','=',$user->id)->get();
        }
        $result = \My_func::getReservationArray($shopReservationAll);
        
        return Inertia::render('Shop/Index', [
            'shops' => $shops,
            'areas' => $areas,
            'genres' => $genres,
            'user' => $user,
            'favorite' => $favorite,
            'reservation' => $result
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        $shopItem = Shop::where('id',$shop->id)
                    ->with(['area','genre','shopFood','shopLimit','shopReservation'])
                    ->first();
        $user = Auth::user();
        $favoriteFlg = false;
        if($user){
            $favoriteFlg = Favorite::where('user_id','=',$user->id)
                                ->where('shop_id','=',$shop->id)
                                ->exists();
        }
        return Inertia::render('Shop/Show', [
            'shop' => $shopItem,
            'favoriteFlg' => $favoriteFlg,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }

    public function getData(Request $request)
    {
        $json = $request->getContent();
        $arr = json_decode($json,true);
        $response = null;
        $limitSeat = ShopLimit::where('shop_id', '=', $arr[0]['shopId'])->first('limit_seat');
        $shopData = ShopReservation::where('shop_id', '=', $arr[0]['shopId'])->first();
        if(empty($shopData) == false){
            foreach($shopData['data'] as $index  => $data){
                $result = '';
                if(substr($index,1,6) == $arr[0]['date']){
                    if($limitSeat['limit_seat'] <= $data){
                        $result = '×';
                    }elseif($limitSeat['limit_seat'] - $data == 1){
                        $result = 'TEL';
                    }elseif($limitSeat['limit_seat'] - $data == 2){
                        $result = '△';
                    } else {
                        $result = '◎';
                    }
                    $response[] = [
                        'date' => substr($index,7),
                        'reserve' => $result
                    ];
                }
            }
        }
        //レスポンスデータ送信
        header('Content-type: application/json');
        echo json_encode($response);
    }
    
    public function registerData(Request $request)
    {
        $json = $request->getContent();
        $arr = json_decode($json,true);
        $targetDate = str_replace('/', '', $arr['date']);
        $shopData = ShopReservation::where('shop_id', '=', $arr['shopId'])->first();
        $dataFlg = 0;
        //予約データを追加・編集
        if(!empty($shopData)){
            //その日の予約データに予約数を加算
            $result = array();
            foreach($shopData['data'] as $index  => $data){
                $result[$index] = $data;
                if(substr($index,1,8) == $targetDate){
                    $result[$index]++;
                    $dataFlg = 1;
                }
            }
            $shopData['data'] = $result;            
            //その日の予約データを新規作成
            if($dataFlg == 0){
                $shopData['data'] += [ 'r'. $targetDate => 1];
            }
        //その日の予約データを新規作成
        }else{
            $shopData['data'] += [ 'r'. $targetDate => 1];
        }
        $shopData->save();

        //ユーザ情報保存
        $user = User::where('email' , '=' , $arr['email'])->first();
        UserReservation::create([
            'user_id' => $user->id,
            'shop_id' => $arr['shopId'],
            'datetime' => $arr['date'].' '.$arr['time'],
            'number' => $arr['num'],
            'history_flg' => 0,
        ]);

        return response()->json([
            'msg' => $arr['date'] . ' ' . $arr['time'] . ' '. $arr['num'] .'名'.'で予約しました！' 
            ], 200
        );
    }

    public function registerFavorite(Request $request)
    {
        $json = $request->getContent();
        $arr = json_decode($json,true);
        $user = User::where('email' , '=' , $arr['email'])->first();
        if($arr['move'] == 'register'){
            Favorite::create([
                'user_id' => $user->id,
                'shop_id' => $arr['shopId'],
            ]);
        }else if($arr['move'] == 'cancel'){
            Favorite::where('user_id','=',$user->id)
                    ->where('shop_id','=',$arr['shopId'])
                    ->delete();
        }
        return response()->json(['msg' => 'success']);
    }

    public function getFavorite(Request $request)
    {
        $json = $request->getContent();
        $arr = json_decode($json,true);
        $user = User::where('email' , '=' , $arr['email'])->first();
        $favorite = Favorite::where('user_id','=',$user->id)
                            ->get();
        return response()->json($favorite);
    }
}
