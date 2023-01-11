<?php

declare(strict_types=1);

namespace Test\Entity\Transport;

use Phant\Notifier\Entity\Transport;
use Phant\Notifier\Entity\Transport\Collection;
use Fixture\Entity\Transport\Email as FixtureEmailTransport;

final class CollectionTest extends \PHPUnit\Framework\TestCase
{
    protected Collection $fixture;

    public function setUp(): void
    {
        $this->fixture = new Collection();
    }

    public function testAdd(): void
    {
        $this->assertEquals(0, $this->fixture->getNbItems());
        $this->fixture->add(
            FixtureEmailTransport::get()
        );
        $this->assertEquals(1, $this->fixture->getNbItems());
    }
}
