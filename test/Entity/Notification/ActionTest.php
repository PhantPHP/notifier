<?php

declare(strict_types=1);

namespace Test\Entity\Notification;

use Phant\Notifier\Entity\Notification\Action;

final class ActionTest extends \PHPUnit\Framework\TestCase
{
    public function testInterface(): void
    {
        $item = new Action(
            'https://domain.ext/path',
            'Action'
        );
        $this->assertInstanceOf(Action::class, $item);

        $this->assertIsString($item->url);
        $this->assertEquals('https://domain.ext/path', $item->url);

        $this->assertIsString($item->label);
        $this->assertEquals('Action', $item->label);
    }
}
