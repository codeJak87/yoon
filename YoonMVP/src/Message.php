<?php

namespace Yoon\YoonMvp;

use Rhumsaa\Uuid\Uuid;

/**
 * Represents a generic message which has a unique id/hash.
 *
 * The message is the central part of the cqrs architecture allowing to be published over the message bus and delegated to the 
 * corresponding handlers registered to it.
 */
interface Message
{
    /**
     * Gets the message id.
     * @return Rhumsaa\Uuid\Uuid
     */

    public function getId();

    /**
     * Gets the message hash signed by the id.
     * @return string
     */
    public function getHashSignedById();
}

?>