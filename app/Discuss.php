<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discuss extends Model
{
    protected $dates = ['dis_date'];
    protected $guarded = [];//$guarded：不允字段批量赋值、$fillable：允许单个字段批量赋值
    protected $primaryKey = 'dis_id';//设置主键

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 关联文章模型
     */
    public function  post(){
        return $this->belongsTo('App\Post','post_id');
    }

    public function answer(){
        return $this->hasMany('App\Answer','discusses_id','dis_id');//hasMany('Model','关联表外键','本表主键')
    }
    //
}
