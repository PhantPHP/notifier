<?php

declare(strict_types=1);

namespace Fixture\Entity;

use Phant\DataStructure\Web\EmailAddressAndName;
use Phant\Notifier\Entity\Notification as NotificationEntity;
use Phant\Notifier\Entity\Notification\Action;
use Phant\Notifier\Entity\Notification\Metadatas;
use Phant\Notifier\Entity\Notification\Recipient;
use Phant\Notifier\Entity\Notification\Type;
use Phant\Notifier\Entity\Transport\Channel;
use Fixture\Entity\Notification\Content;

final class Notification
{
    public static function get(): NotificationEntity
    {
        return self::getEmail();
    }

    public static function getEmail(): NotificationEntity
    {
        return new NotificationEntity(
            Type::Information,
            Content::get(),
            new Action(
                'https://domain.ext/path',
                'Action'
            ),
            new Recipient(
                EmailAddressAndName::make(
                    'john.doe@domain.ext',
                    'John DOE'
                )
            ),
            Channel::Email
        );
    }

    public static function getChat(): NotificationEntity
    {
        return new NotificationEntity(
            Type::Information,
            Content::get(),
            new Action(
                'https://domain.ext/path',
                'Action'
            ),
            new Recipient(
                'john.doe@domain.ext'
            ),
            Channel::Chat
        );
    }

    public static function getEmailRecipientInvalid(): NotificationEntity
    {
        return new NotificationEntity(
            Type::Information,
            Content::get(),
            new Action(
                'https://domain.ext/path',
                'Action'
            ),
            new Recipient(
                'foo bar'
            ),
            Channel::Email
        );
    }
}
