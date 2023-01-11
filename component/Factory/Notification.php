<?php

declare(strict_types=1);

namespace Phant\Notifier\Factory;

use Phant\Notifier\Entity\Notification as NotificationEntity;
use Phant\Notifier\Entity\Channel;
use Phant\Notifier\Entity\Channel\Collection as ChannelCollection;
use Phant\Notifier\Entity\Notification\Action;
use Phant\Notifier\Entity\Notification\Recipient;

class Notification
{
    public static function make(
        string|array|Channel|ChannelCollection $channels,
        string $title,
        string $message,
        ?string $actionUrl,
        ?string $actionLabel,
        ?string $recipientId,
        ?string $recipientName
    ): NotificationEntity {
        if (is_string($channels)) {
            $channels = Channel::from($channels);
        }

        if (is_array($channels)) {
            $channelsList = new ChannelCollection();
            foreach ($channels as $channel) {
                $channelsList->add(
                    Channel::from($channel)
                );
            }
            $channels = $channelsList;
        }

        if (is_a($channels, Channel::class)) {
            $channels = (new ChannelCollection())
                ->add(
                    $channels
                )
            ;
        }

        return new NotificationEntity(
            $channels,
            $title,
            $message,
            $actionUrl ? new Action(
                $actionUrl,
                $actionLabel
            ) : null,
            $recipientId ? new Recipient(
                $recipientId,
                $recipientName
            ) : null
        );
    }
}
