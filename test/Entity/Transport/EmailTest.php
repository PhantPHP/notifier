<?php

declare(strict_types=1);

namespace Test\Entity\Transport;

use Phant\Notifier\Entity\Transport\Channel;
use Phant\Notifier\Entity\Transport\Email;
use Fixture\Entity\Notification as FixtureNotification;
use Fixture\Entity\Transport\Email as FixtureEmailTransport;

final class EmailTest extends \PHPUnit\Framework\TestCase
{
    protected Email $fixture;

    public function setUp(): void
    {
        $this->fixture = FixtureEmailTransport::get();
    }

    public function testDispatch(): void
    {
        $result = $this->fixture->dispatch(
            FixtureNotification::get()
        );
        $this->assertEquals(true, $result);
    }

    public function testCanBeTransported(): void
    {
        $result = $this->fixture->canBeTransported(
            FixtureNotification::getEmail()
        );
        $this->assertEquals(true, $result);

        $result = $this->fixture->canBeTransported(
            FixtureNotification::getChat()
        );
        $this->assertEquals(false, $result);
    }
}
