<?php

namespace App\Jobs;

use App\Discuss;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DiscussFormFields extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $dis_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $fieldList = [
        'post_id'=>'',
        'dis_cont' => '',
        'userName' => '',
        'dis_date' => '',
    ];
    public function __construct($dis_id=null)
    {
        $this->dis_id = $dis_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fields = $this->fieldList;
        if($this->dis_id){
            $fields=$this ->fieldsFromModel($this->dis_id,$fields);

        } else {
            $when = Carbon::now()->addHour();
            $fields['dis_date'] = $when->format('Y-m-d H:i:s');
        }
        return array_merge(
            $fields
        );
    }
    protected function fieldsFromModel($id, array $fields)
    {
        $discuss = Discuss::findOrFail($id);

        $fieldNames = array_keys(array_except($fields, ['tags']));

        $fields = ['id' => $id];
        foreach ($fieldNames as $field) {
            $fields[$field] = $discuss->{$field};
        }

        //$fields['tags'] = $post->tags()->lists('tag')->all();

        return $fields;
    }
}
