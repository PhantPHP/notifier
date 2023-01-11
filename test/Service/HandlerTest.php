<?php

declare(strict_types=1);

namespace Test\Service;

use Phant\Notifier\Service\Handler;
use Fixture\Entity\Notification as FixtureNotification;
use Fixture\Service\Handler as HandlerServiceFixture;

final class HandlerTest extends \PHPUnit\Framework\TestCase
{
    protected Handler $fixture;

    public function setUp(): void
    {
        $this->fixture = (new HandlerServiceFixture())();
    }

    public function testDispatch(): void
    {
        $this->fixture->dispatch(
            FixtureNotification::get()
        );

        $this->addToAssertionCount(1);
    }

    public function testDispatchCanbeTransported(): void
    {
        $this->fixture->dispatch(
            FixtureNotification::getChat()
        );

        $this->addToAssertionCount(1);
    }
}
