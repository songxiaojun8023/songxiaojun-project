<?php
/**
 * Created by PhpStorm.
 * User: 郭鹏航
 * Date: 2019/5/30
 * Time: 23:00
 */

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Integral  extends Model
{
    use Notifiable;

    /**
     * 模型中日期字段的存储格式
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function myIntegral(){
        $id = Auth::id();
        $data = DB::table('intgral')->where(['user_id'=>$id])->orderBy('intgral_id','desc')->get();
//        dd($data);
        return $data;
    }
}