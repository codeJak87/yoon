<?php

namespace Yoon\YoonMvp\Domain\Aggregate;

use Yoon\YoonMvp\Domain\State\FileMetaData as FileMetaDataState;
use Yoon\YoonMvp\Process;
use Yoon\YoonMvp\Event;
use Ramsey\Uuid\Uuid;

class FileMetaData extends Process
{
    private $fileState;

    function __construct(FileMetaDataState $fileState)
    {
        parent::__construct($fileState);
    }

    /**
     * Applies the new state with the given event.
     * @return void
     */
    final public function apply(Event $event):Promise 
    {
        return new Promise();
    }
}


?>