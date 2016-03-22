<?php

namespace App\Jobs;

use App\Answer;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnswerFormFields extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $ans_id;
    protected $fieldList = [
        'ans_cont'=>'',
        'discusses_id'=>'',
        'ans_date'=>'',
    ];
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ans_id = null)
    {
        $this -> ans_id = $ans_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fields = $this->fieldList;
        if($this->ans_id){
            $fields = $this ->fieldFormModel($this -> ans_id,$fields);
        }else{
            $when = Carbon::now()->addHouer();
            $fields['ans_date'] = $when -> format('Y-m-d H:i:s');
        }
        return array_merge($fields);
    }
    public  function fieldFormModel($id,array $fields){
        $answer = Answer::findOrFail($id);
        $fieldNames = array_keys(array_except($fields,['tags']));
        $fields = ['id'=>$id];
        foreach($fieldNames as $field){
            $fields[$field] = $answer -> {$field};
        }
        return $fields;
    }
}
