<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bet extends Model
{
    protected $fillable = ['price', 'lot_id', 'user_id'];


    public static function get_all(){
        return DB::table('bets')
            ->orderBy('bets.lot_id')
            ->orderByDesc('bets.updated_at')
            ->join('users', 'bets.user_id', '=', 'users.id')
            ->join('lots', 'bets.lot_id', '=', 'lots.id')
            ->select('bets.*', 'users.name as user_name', 'users.email as user_email', 'lots.title as lot_title', 'lots.price as lot_price', 'lots.currency as lot_currency')
            ->get();
    }

    public static function get_by_lot($id) {
        return DB::table('bets')
            ->orderBy('bets.lot_id')
            ->orderByDesc('bets.updated_at')
            ->join('users', 'bets.user_id', '=', 'users.id')
            ->join('lots', 'bets.lot_id', '=', 'lots.id')
            ->select('bets.*', 'users.name as user_name', 'users.email as user_email', 'lots.title as lot_title')
            ->where('lot_id', $id)
            ->get();
    }



    public static function add($fields){
        $bet = new Bet();
        $bet->fill($fields);
        $bet->save();
    }

    public static function edit($fields, $id) {
        $bet = Bet::find($id);
        $bet->fill($fields);
        $bet->save();
    }
}
