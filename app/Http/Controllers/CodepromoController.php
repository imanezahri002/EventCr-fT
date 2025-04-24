<?php

namespace App\Http\Controllers;

use App\Models\Codepromo;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class CodepromoController extends Controller
{
   public function validateCodePromo(Request $request)
   {

    $codepromo=$request->codePromo;
    $codepromo=Codepromo::where('code',$codepromo)->first();
    $event = $request->event;

    if(!$codepromo){
        return response()->json([
            'valide' => false,
            ]);
    }else if($event == $codepromo->event_id){

        return response()->json(
            [
                'valide' => true,
                'codePromo'=>$codepromo
            ]
        );
    }
    }
}
