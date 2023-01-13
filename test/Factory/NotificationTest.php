<?php

declare(strict_types=1);

namespace Test\Factory;

use Phant\Notifier\Entity\Notification;
use Phant\Notifier\Entity\Transport\Channel;
use Phant\Notifier\Factory\Notification as NotificationFactory;
use Fixture\Entity\Notification as FixtureNotification;

final class NotificationTest extends \PHPUnit\Framework\TestCase
{
    public function testMake(): void
    {
        $fixture = FixtureNotification::getChat();
        $item = NotificationFactory::make(
            (string) $fixture->type->value,
            $fixture->content,
            $fixture->action,
            (string) $fixture->recipient->value,
            (string) $fixture->channel->value,
        );
        $this->assertInstanceOf(Notification::class, $item);
    }
}
