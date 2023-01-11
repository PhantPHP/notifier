<?php

declare(strict_types=1);

namespace Test\Entity\Transport;

use Phant\Error\NotCompliant;
use Phant\Notifier\Entity\Notification;
use Fixture\Entity\Notification as FixtureNotification;

final class NotificationTest extends \PHPUnit\Framework\TestCase
{
    protected Notification $fixture;

    public function setUp(): void
    {
        $this->fixture = FixtureNotification::get();
    }

    public function testNotCompliantNoRecipient(): void
    {
        $this->expectException(NotCompliant::class);

        FixtureNotification::getEmailNoRecipient();
    }

    public function testNotCompliantInvalidRecipientId(): void
    {
        $this->expectException(NotCompliant::class);

        FixtureNotification::getEmailRecipientInvalidId();
    }
}
