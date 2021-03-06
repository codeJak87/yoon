<?php
namespace Yoon\YoonMvp;

use Yoon\YoonMvp\AggregateRoot; 
use GuzzleHttp\Promise\Promise;

abstract class Process extends AggregateRoot
{
    /**
     * Applies the new state with the given event.
     * @return void
     */
    public abstract function getProcessState():string;
}