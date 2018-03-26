<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flower;
use \DB;

class FlowersController extends Controller
{
    public function index(){

        DB::insert("CALL InsertFlowers('lalele', 'mici','rosii','100')");
        DB::insert("CALL InsertFlowers('trandafiri', 'mari','rosii','200')");
        DB::insert("CALL InsertFlowers('toporasi', 'mici','albi','150')");
        DB::insert("CALL InsertFlowers('ghiocei', 'mici','albi','10')");
        $flowers1=DB::select('CALL GetFlowers()');
        DB::select('CALL UpdateFlowers("toporasi")');
        DB::select('CALL DeleteFlowers("ghiocei")');
        $flowers2=DB::select('CALL GetFlower("trandafiri")');
        $flowers3=DB::select('CALL GetUpdated()');

        return view('pages.flowers')->with([
            'title'=>'Flowers data',
            'flowers1'=> $flowers1,
            'flowers2'=>$flowers2,
            'flowers3'=>$flowers3]);
    }
}
