<?php

namespace App\Http\Controllers;

use App\Conllect;
use Illuminate\Http\Request;

class ConllectController extends Controller
{
    //收藏试题
    public function conllectQuestion(Request $request){
        $qid = $request->all();
//        dd($qid);
        $conllect = new Conllect();
        $data = $conllect->getConllect($qid);
//       dd($data);

//        return view('question.showOneQuestion')->with('data',$data);
    }
}
