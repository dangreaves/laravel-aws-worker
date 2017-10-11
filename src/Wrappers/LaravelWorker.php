<?php

namespace Dusterio\AwsWorker\Wrappers;

use Illuminate\Queue\Worker;
use Dusterio\AwsWorker\Jobs\AwsJob;
use Illuminate\Queue\WorkerOptions;

class LaravelWorker implements WorkerInterface
{
    /**
     * Worker.
     *
     * @var Worker
     */
    protected $worker;

    /**
     * LaravelWorker constructor.
     *
     * @param Worker $worker
     */
    public function __construct(Worker $worker)
    {
        $this->worker = $worker;
    }

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
        $workerOptions = new WorkerOptions($options['delay'], 128, 60, 3, $options['maxTries']);

        $this->worker->process(
            $queue, $job, $workerOptions
        );
    }
}
