<?php

namespace Yoon\YoonMvp\Commnand\Handler;

use Yoon\YoonMvp\Commnand\MakeUploadCommand;
use Yoon\YoonMvp\Handler;
use Yoon\YoonMvp\Message;
use Yoon\YoonMvp\MessageBus;
use Yoon\YoonMvp\ProcessManager;
use Yoon\YoonMvp\RepositoryPipe;
use Yoon\YoonMvp\ErrorLog\ErrorLogException;
use Yoon\YoonMvp\ErrorLog\ErrorLogType;
use Ramsey\Uuid\Uuid;
use GuzzleHttp\Promise\Promise;


/**
 * Handles the make upload command for generating a blockchain based upload.
 *
 */
class MakeUploadCommandHandler implements Handler
{
    private $messageBus;
    private $repositoryPipe;
    private $processManager;

    function __constructor(MessageBus $messageBus, RepositoryPipe $repositoryPipe, ProcessManager $processManager)
    {
        $this->$messageBus = $messageBus;
        $messageBus->register($this);
        $this->repositoryPipe = $repositoryPipe;
        $this->processManager = $processManager;
    }

    /**
     * Gets the message type.
     * @return string
     */
    public function getMessageType() 
    {
        return MakeUploadCommand::class;
    }

    /**
     * Handles a message.
     *
     * @param Event $event
     * @return Promise
     */
    public function getHandle(Message $message) : Promise
    {
        if(get_class($message) != $this->getMessageType())
        {
            throw new ErrorLogException(ErrorLogType::Logical, "Invalid message type within".MakeUploadCommandHandler::class.".");
        }
        
    }

    private function constructHandle(RepositoryPipe $pipe, ProcessManager $manager, MakeUploadCommand $command) : Promise 
    {

        return $manager->apply()->then(function() use($manager, $pipe){
            
            $pipe->saveAll();
        });
    }

}

?>