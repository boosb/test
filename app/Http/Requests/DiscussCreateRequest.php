<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class DiscussCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dis_cont'=>'required',
            'userName'=>'required'
        ];
    }
    public  function  messages()
    {
        return [
            'required' => ':attribute 必须填写',
        ];
    }
    public  function  attributes()
    {
        return [
            'dis_cont'=>'内容',
            'userName'=>'用户名'
        ];
    }

    /**
     * 填充数据
     */
    public  function  discussFillDate(){
        $dis_date =  Carbon::now();
        return [
            'post_id'=>$this->post_id,
            'dis_cont'=> $this->get('dis_cont'),
            'userName'=>$this->userName,
            'dis_date'=>$this->$dis_date,
        ];
    }
}
