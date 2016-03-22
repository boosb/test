<?php

namespace App;
use App\Discuss;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates =['published_at'];
    protected $guarded = [];//$guarded：不允字段批量赋值、$fillable：允许单个字段批量赋值
    /**
     * 获取博客文章的评论
     */
    public function discuss()
    {
        return $this->hasMany('App\Discuss','post_id');
    }

    public function setTitleAttribute($value)
    {

        $this->attributes['title'] = $value;//将ModelPost的title赋值为传入的值$value?
        if(!$this->exists){
          $this->attributes['slug'] = str_slug($value);
        }


    }
    /**
     * 若副标题为空，将标题值赋予
     *
     * @param string $title
     * @param mixed $extra
     */
    protected function setUniqueSlug($title, $extra)
    {
        $slug = str_slug($title.'-'.$extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($title, $extra + 1);
            return;
        }

        $this->attributes['slug'] = $slug;
    }
    /**
     * 获取日期-- published_at
     */
    public function getPublishDateAttribute($value)
    {
        return $this->published_at->format('Y-m-d');
    }

    /**
     * 获取时间-- published_at
     */
    public function getPublishTimeAttribute($value)
    {
        return $this->published_at->format('H:i:s');
    }

}
