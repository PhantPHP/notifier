<?php

declare(strict_types=1);

namespace Test\Entity\Notification;

use Phant\Notifier\Entity\Notification\Recipient;

final class RecipientTest extends \PHPUnit\Framework\TestCase
{
    public function testInterface(): void
    {
        $item = new Recipient(
            'john@doe.com',
            'John DOE'
        );
        $this->assertInstanceOf(Recipient::class, $item);

        $this->assertIsString($item->id);
        $this->assertEquals('john@doe.com', $item->id);

        $this->assertIsString($item->name);
        $this->assertEquals('John DOE', $item->name);
    }
}
