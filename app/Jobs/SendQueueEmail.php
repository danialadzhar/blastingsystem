<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\UserEmail;
use Mail;
use App\Mail\CustomEmail;

class SendQueueEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    public $timeout = 7200;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user_email = UserEmail::where('group_id', $this->details['group_id'])->get();
        $input['subject'] = $this->details['subject'];
        $input['email_content'] = $this->details['email_content'];
        $input['email_from'] = $this->details['email_from'];
        $input['name_from'] = $this->details['name_from'];
        $input['support_file'] = $this->details['support_file'];

        foreach ($user_email as $key => $value) 
        {
            $input['email'] = $value->email;
            $input['name'] = $value->name;

            Mail::to($input['email'], $input['name'])->send(new CustomEmail($input['subject'],$input['email_content'],$input['email_from'],$input['name_from'],$input['support_file']));
        }
    }
}