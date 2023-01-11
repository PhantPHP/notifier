<?php

declare(strict_types=1);

namespace Test\Factory;

use Phant\Notifier\Entity\Channel;
use Phant\Notifier\Entity\Notification;
use Phant\Notifier\Factory\Notification as NotificationFactory;
use Fixture\Entity\Notification as FixtureNotification;

final class NotificationTest extends \PHPUnit\Framework\TestCase
{
    public function testMake(): void
    {
        $fixture = FixtureNotification::get();
        $item = NotificationFactory::make(
            Channel::Email->value,
            $fixture->title,
            $fixture->message,
            $fixture->action->url,
            $fixture->action->label,
            $fixture->recipient->id,
            $fixture->recipient->name
        );
        $this->assertInstanceOf(Notification::class, $item);

        $fixture = FixtureNotification::get();
        $item = NotificationFactory::make(
            [
                Channel::Email->value
            ],
            $fixture->title,
            $fixture->message,
            $fixture->action->url,
            $fixture->action->label,
            $fixture->recipient->id,
            $fixture->recipient->name
        );
        $this->assertInstanceOf(Notification::class, $item);
    }
}
