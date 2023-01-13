<?php

declare(strict_types=1);

namespace Test\Entity\Notification;

use Phant\DataStructure\Web\EmailAddress;
use Phant\DataStructure\Web\EmailAddressAndName;
use Phant\Notifier\Entity\Notification\Recipient;
use Phant\Notifier\Entity\Transport\Channel;

final class RecipientTest extends \PHPUnit\Framework\TestCase
{
    protected Recipient $fixture;
    protected Recipient $fixtureEmailAddress;
    protected Recipient $fixtureEmailAddressAndName;

    public function setUp(): void
    {
        $this->fixture = new Recipient('john.doe@domain.ext');
        $this->fixtureEmailAddress = new Recipient(
            new EmailAddress('john.doe@domain.ext')
        );
        $this->fixtureEmailAddressAndName = new Recipient(
            EmailAddressAndName::make('john.doe@domain.ext', 'John DOE')
        );
    }


    public function testInterface(): void
    {
        $this->assertIsString($this->fixture->value);
        $this->assertEquals('john.doe@domain.ext', $this->fixture->value);

        $this->assertInstanceOf(EmailAddress::class, $this->fixtureEmailAddress->value);

        $this->assertInstanceOf(EmailAddressAndName::class, $this->fixtureEmailAddressAndName->value);
    }

    public function testIsCompliantWithChannel(): void
    {
        $this->assertEquals(true, $this->fixture->isCompliantWithChannel(Channel::Chat));
        $this->assertEquals(false, $this->fixture->isCompliantWithChannel(Channel::Email));

        $this->assertEquals(true, $this->fixtureEmailAddress->isCompliantWithChannel(Channel::Chat));
        $this->assertEquals(true, $this->fixtureEmailAddress->isCompliantWithChannel(Channel::Email));

        $this->assertEquals(true, $this->fixtureEmailAddressAndName->isCompliantWithChannel(Channel::Chat));
        $this->assertEquals(true, $this->fixtureEmailAddressAndName->isCompliantWithChannel(Channel::Email));
    }
}
