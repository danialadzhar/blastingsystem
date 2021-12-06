<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EmailCron;

class EmailBlastCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blast:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Blast Email with Cron Job';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;

        $email_cron = EmailCron::first();

        $details = [
            'subject' => $email_cron->subject,
            'email_content' => $email_cron->email_content,
            'group_id' => $email_cron->group_id,
            'email_from' => $email_cron->email_from,
            'name_from' => $email_cron->name_from,
        ];

        $job = (new \App\Jobs\SendQueueEmail($details))->delay(now()->addSeconds(2));

        dispatch($job);

        $email_cron_destroy = EmailCron::first();
        $email_cron_destroy->delete();

    }
}
