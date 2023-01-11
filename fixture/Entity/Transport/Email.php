<?php

declare(strict_types=1);

namespace Fixture\Entity\Transport;

use Phant\Notifier\Entity\Transport\Email as EmailTransportEntity;
use Fixture\Port\EmailBuilder;
use Fixture\Port\EmailSender;

final class Email
{
    public static function get(): EmailTransportEntity
    {
        return new EmailTransportEntity(
            new EmailBuilder(),
            new EmailSender(),
            'john@doe.com',
            'John DOE'
        );
    }
}
