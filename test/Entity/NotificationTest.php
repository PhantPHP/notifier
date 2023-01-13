<?php

declare(strict_types=1);

namespace Test\Entity\Transport;

use Phant\Error\NotCompliant;
use Phant\Notifier\Entity\Notification;
use Phant\Notifier\Entity\Notification\Action;
use Phant\Notifier\Entity\Notification\Content;
use Phant\Notifier\Entity\Notification\Recipient;
use Phant\Notifier\Entity\Notification\Type;
use Phant\Notifier\Entity\Transport\Channel;
use Fixture\Entity\Notification as FixtureNotification;

final class NotificationTest extends \PHPUnit\Framework\TestCase
{
    protected Notification $fixture;

    public function setUp(): void
    {
        $this->fixture = FixtureNotification::get();
    }

    public function testInterface(): void
    {
        $this->assertInstanceOf(Type::class, $this->fixture->type);
        $this->assertInstanceOf(Content::class, $this->fixture->content);
        $this->assertInstanceOf(Action::class, $this->fixture->action);
        $this->assertInstanceOf(Recipient::class, $this->fixture->recipient);
        $this->assertInstanceOf(Channel::class, $this->fixture->channel);
    }

    public function testNotCompliantInvalidRecipient(): void
    {
        $this->expectException(NotCompliant::class);

        FixtureNotification::getEmailRecipientInvalid();
    }
}
