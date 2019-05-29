<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conllect extends Model
{
    /**
     * 模型中日期字段的存储格式
     *
     * @var string
     */
    protected $dateFormat = 'U';
    /**
     * 指定 table
     */
    public $table = 'conllect';
}
