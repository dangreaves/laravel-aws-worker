<?php

namespace Dusterio\AwsWorker\Integrations;

use Dusterio\AwsWorker\Wrappers\ProcessWorker;
use Dusterio\AwsWorker\Wrappers\WorkerInterface;
use Dusterio\AwsWorker\Wrappers\DefaultWorker;
use Dusterio\AwsWorker\Wrappers\Laravel53Worker;

/**
 * Class BindsWorker
 * @package Dusterio\AwsWorker\Integrations
 */
trait BindsWorker
{
    /**
     * @return void
     */
    protected function bindWorker()
    {
        $this->app->bind(WorkerInterface::class, ProcessWorker::class);
    }
}
