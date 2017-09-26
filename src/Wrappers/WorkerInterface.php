<?php

namespace Dusterio\AwsWorker\Wrappers;

/**
 * Interface WorkerInterface
 * @package Dusterio\AwsWorker\Wrappers
 */
interface WorkerInterface
{
    /**
     * @param $queue
     * @param $job
     * @return mixed
     */
    public function process($queue, $job);
}