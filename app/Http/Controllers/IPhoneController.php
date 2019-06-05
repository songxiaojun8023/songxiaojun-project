<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
    class IPhoneController extends Controller{
        public function index(){
            return view("Iphone/index");
        }
        public function imgsearchQuestion(){
            return view("Iphone/pushQuestion");
        }
        public function searchQusetion(Request $request){
            $post = $request->all();
            echo $post["search"];
        }
        public function moresearchQuestion(Request $request){
            $post = $request->all();
           dd($post['question']);
        }
    }
?>