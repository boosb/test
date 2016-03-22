<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class PostCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//判断请求用户是否经过授权--false禁止所有提交。true允许所有提交
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'publish_date' => 'required',
            'publish_time' => 'required',
        ];
    }

    /**
     * 数据校验提示
     * @return array
     *
     */
    public function messages()
    {
        return [
            'required' => ':attribute 必须填写.'
        ];
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'content'=>'内容',
            'slug'=>'副标题'
        ];
    }

    /**
     * 返回值创建新的文章
     */
    public function postFillData()
    {
        $published_at = new Carbon(
            $this->publish_date.' '.$this->publish_time
        );
        return [
            'title' => $this->title,
            'content' => $this->get('content'),
            'slug' => $this->slug,
            'published_at' => $published_at,
        ];
    }
}
