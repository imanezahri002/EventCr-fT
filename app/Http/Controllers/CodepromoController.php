<?php

namespace App\Http\Controllers;

use App\Models\Codepromo;
use App\Models\Reservation;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class CodepromoController extends Controller
{
   public function validateCodePromo(Request $request)

   {
    $codepromo=$request->code;
    $codepromo=Codepromo::where('code',$codepromo)->first();
    $eventid = $request->event;

    // dd($codepromo->reservations());

    if(!$codepromo){
        return response()->json([
            'valide' => false,
            ]);


    }
    $usageCount = Reservation::where('code_id', $codepromo->id)->count();

    // dd($usageCount);
    if($eventid == $codepromo->event_id && $usageCount < $codepromo->nbUtilisation){

        return response()->json(
            [
                'valide' => true,
                'codePromo'=>$codepromo
            ]
        );
    }
    }
}
