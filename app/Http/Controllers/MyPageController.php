<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserReservation;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MyPageController extends Controller
{
    public function index()
    {
        //ログインユーザのお気に入り情報取得
        $user = Auth::user();
        if($user == null){
            return redirect()->route('shop.index');
        }
        $favorite = User::where('id',$user->id)
                    ->with(['favorite.shop.area','favorite.shop.genre'])
                    ->first();
        $shopReservationAll = Shop::with(['shopReservation','shopLimit'])->get();
        $result = \My_func::getReservationArray($shopReservationAll);
        //ログインユーザの予約履歴取得
        $userReservations = UserReservation::where('user_id',$user->id)
                            ->with('shop')
                            ->get();
        return Inertia::render('Shop/MyPage', [
            'user' => $favorite,
            'reservation' => $result,
            'userHistory' => $userReservations
        ]);
    }
}
