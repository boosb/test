<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Jobs\AnswerFormFields;
use Illuminate\Http\Request;
use App\Http\Requests\AnswerCreateRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class AnswerController extends Controller
{
    public  function  index(){

    }
    public function create(){
        $data = $this -> dispatch(new AnswerFormFields());
        return view('answer.create',$data);
    }

    public function store(AnswerCreateRequest $request){

        Answer::create($request-> answerFillData());
               return redirect()
                      ->back();
    }

}
