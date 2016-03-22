<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $dates = ['ans_date'];
    protected $guarded = [];//不允许这些字段批量赋值
    protected $primarykey = 'ans_id';//主键

    /**
     * 关联评论表
     */
    public  function discuss(){
        $this->belongsTo('App\Discuss','discusses_id');
    }
}
