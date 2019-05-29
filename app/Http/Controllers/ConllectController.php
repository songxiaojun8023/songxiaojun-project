<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConllectController extends Controller
{
    //收藏试题
    public function conllectQuestion(){
        return ['code'=>200,'message'=>'ok'];
    }
}
