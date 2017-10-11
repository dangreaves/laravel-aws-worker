<?php

namespace Dusterio\AwsWorker\Commands;

use Illuminate\Console\Command;
use Dusterio\AwsWorker\Jobs\AwsJob;
use Dusterio\AwsWorker\Wrappers\LaravelWorker;

class ProcessCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:process-sqs {queue} {job} {options}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process the given SQS job payload';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        app(LaravelWorker::class)->process(
            $this->argument('queue'),
            new AwsJob(
                app(),
                $this->argument('queue'),
                json_decode($this->argument('job'), true)
            ),
            json_decode($this->argument('options'), true)
        );
    }
}
