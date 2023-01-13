<?php

declare(strict_types=1);

namespace Test\Entity\Notification;

use Phant\Error\NotCompliant;
use Phant\Error\NotFound;
use Phant\Notifier\Entity\Notification\Content\Metadatas;

final class MetadatasTest extends \PHPUnit\Framework\TestCase
{
    protected Metadatas $fixture;

    public function setUp(): void
    {
        $this->fixture = (new Metadatas())
            ->add('Foo', 'Bar');
    }

    public function testAdd(): void
    {
        $item = $this->fixture->add('Bar', 'Foo');

        $this->assertInstanceOf(Metadatas::class, $item);
    }

    public function testRemove(): void
    {
        $item = $this->fixture->remove('Foo', 'Bar');

        $this->assertInstanceOf(Metadatas::class, $item);
    }

    public function testRemoveNotFound(): void
    {
        $this->expectException(NotFound::class);

        $this->fixture->remove('Bar', 'Foo');
    }

    public function testGet(): void
    {
        $result = $this->fixture->get('Foo');

        $this->assertIsString($result);
        $this->assertEquals('Bar', $result);
    }

    public function testGetNotFound(): void
    {
        $this->expectException(NotFound::class);

        $this->fixture->get('Bar');
    }

    public function testIterate(): void
    {
        foreach ($this->fixture->iterate() as $key => $value) {
            $this->assertEquals('Foo', $key);
            $this->assertEquals('Bar', $value);
        }
    }

    public function testToArray(): void
    {
        $result = $this->fixture->toArray();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('Foo', $result);
        $this->assertEquals('Bar', $result['Foo']);
    }

    public function testCleanKey(): void
    {
        $this->expectException(NotCompliant::class);

        $this->fixture->get(' ');
    }
}
