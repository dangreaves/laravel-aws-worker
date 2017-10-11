<?php

namespace Dusterio\AwsWorker\Wrappers;

use Dusterio\AwsWorker\Jobs\AwsJob;
use Symfony\Component\Process\ProcessBuilder;

class ProcessWorker implements WorkerInterface
{
    /**
     * Process the given job.
     *
     * @param  string $queue
     * @param  AwsJob $job
     * @param  array  $options
     * @return void
     */
    public function process($queue, $job, array $options)
    {
        $builder = new ProcessBuilder([
            '/usr/bin/php',
            base_path('artisan'),
            'queue:process-sqs',
            $queue,
            json_encode($job->getSqsJob()),
            json_encode($options)
        ]);

        $builder->getProcess()->mustRun();
    }
}
