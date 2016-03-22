<?php

namespace App\Http\Requests;
use Carbon\Carbon;
use App\Http\Requests\Request;

class AnswerCreateRequest extends Request
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
            'ans_cont'=>'required',
            'discusses_id'=>'required'
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
            'ans_cont'=>'内容',
            'discusses_id'=>'回复消息对象'
        ];
    }
    public function answerFillData(){
        $ans_date = Carbon::now();
        return[
            'ans_cont'=>$this->get('ans_cont'),
            'discusses_id'=>$this->discusses_id,
            'ans_date'=>$this->$ans_date,
        ];
    }
}
