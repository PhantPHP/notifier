<?php

declare(strict_types=1);

namespace Fixture\Entity\Transport;

use Phant\EmailSender\Service\EmailBuilder;
use Phant\Notifier\Entity\Transport\Email as EmailTransportEntity;
use Fixture\Port\EmailSender;

final class Email
{
    public static function get(): EmailTransportEntity
    {
        return new EmailTransportEntity(
            new EmailBuilder(),
            new EmailSender(),
            'john.doe@domain.ext',
            'John DOE'
        );
    }
}
