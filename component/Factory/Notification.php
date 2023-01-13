<?php

declare(strict_types=1);

namespace Phant\Notifier\Factory;

use Phant\Notifier\Entity\Notification as NotificationEntity;
use Phant\Notifier\Entity\Notification\Action;
use Phant\Notifier\Entity\Notification\Content;
use Phant\Notifier\Entity\Notification\Recipient;
use Phant\Notifier\Entity\Notification\Type;
use Phant\Notifier\Entity\Transport\Channel;

class Notification
{
    public static function make(
        string|Type $type,
        Content $content,
        null|Action $action,
        string|Recipient $recipient,
        string|Channel $channel
    ): NotificationEntity {
        if (is_string($type)) {
            $type = Type::from($type);
        }

        if (is_string($recipient)) {
            $recipient = new Recipient($recipient);
        }

        if (is_string($channel)) {
            $channel = Channel::from($channel);
        }

        return new NotificationEntity(
            $type,
            $content,
            $action,
            $recipient,
            $channel
        );
    }
}
