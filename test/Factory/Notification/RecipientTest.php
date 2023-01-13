<?php

declare(strict_types=1);

namespace Test\Factory;

use Phant\Error\NotCompliant;
use Phant\DataStructure\Web\EmailAddress;
use Phant\DataStructure\Web\EmailAddressAndName;
use Phant\Notifier\Entity\Notification\Recipient;
use Phant\Notifier\Entity\Transport\Channel;
use Phant\Notifier\Factory\Notification\Recipient as RecipientFactory;

final class RecipientTest extends \PHPUnit\Framework\TestCase
{
    public function testMake(): void
    {
        $item = RecipientFactory::make(
            'john.doe@domain.ext',
            Channel::Email
        );
        $this->assertInstanceOf(Recipient::class, $item);

        $item = RecipientFactory::make(
            new EmailAddress('john.doe@domain.ext'),
            Channel::Email
        );
        $this->assertInstanceOf(Recipient::class, $item);

        $item = RecipientFactory::make(
            EmailAddressAndName::make('john.doe@domain.ext', 'John DOE'),
            Channel::Email
        );
        $this->assertInstanceOf(Recipient::class, $item);
    }

    public function testMakeNotCompliant(): void
    {
        $this->expectException(NotCompliant::class);

        RecipientFactory::make(
            123,
            Channel::Email
        );
    }
}
