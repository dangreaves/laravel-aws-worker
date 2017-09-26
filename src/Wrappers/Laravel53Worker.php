<?php

namespace Dusterio\AwsWorker\Wrappers;

use Illuminate\Queue\Worker;
use Illuminate\Queue\WorkerOptions;

/**
 * Class Laravel53Worker
 * @package Dusterio\AwsWorker\Wrappers
 */
class Laravel53Worker implements WorkerInterface
{
    /**
     * DefaultWorker constructor.
     * @param Worker $worker
     */
    public function __construct(Worker $worker)
    {
        $this->worker = $worker;
    }

    /**
     * @param $queue
     * @param $job
     * @return void
     */
    public function process($queue, $job)
    {
        $workerOptions = new WorkerOptions(
            0, // Delay
            128, // Memory
            array_get($job->getBody(), 'timeout'), // Timeout
            3, // Sleep
            0 // Max tries
        );

        $this->worker->process(
            $queue, $job, $workerOptions
        );
    }
}
