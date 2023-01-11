<?php

declare(strict_types=1);

namespace Test\Entity\Channel;

use Phant\Notifier\Entity\Channel;
use Phant\Notifier\Entity\Channel\Collection;

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
            Channel::Browser
        );
        $this->assertEquals(1, $this->fixture->getNbItems());
    }

    public function testContains(): void
    {
        $result = $this->fixture->contains(
            Channel::Browser
        );
        $this->assertEquals(false, $result);

        $this->fixture->add(
            Channel::Browser
        );

        $result = $this->fixture->contains(
            Channel::Browser
        );
        $this->assertEquals(true, $result);
    }
}
