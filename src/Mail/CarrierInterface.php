<?php
namespace DreadLabs\VantomasWebsite\Mail;

use DreadLabs\VantomasWebsite\Mail\Exception\FailedRecipientsException;

interface CarrierInterface
{

    /**
     * @param ConveyableInterface $conveyable
     * @return void
     * @throws FailedRecipientsException
     */
    public function convey(ConveyableInterface $conveyable);
}
