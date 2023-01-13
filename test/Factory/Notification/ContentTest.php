<?php

declare(strict_types=1);

namespace Test\Factory;

use Phant\Notifier\Entity\Notification\Content;
use Phant\Notifier\Factory\Notification\Content as ContentFactory;
use Fixture\Entity\Notification\Content as FixtureContent;

final class ContentTest extends \PHPUnit\Framework\TestCase
{
    public function testMake(): void
    {
        $fixture = FixtureContent::get();
        $item = ContentFactory::make(
            (string) $fixture->subject,
            (string) $fixture->body,
            $fixture->metadatas->toArray()
        );
        $this->assertInstanceOf(Content::class, $item);
    }
}
