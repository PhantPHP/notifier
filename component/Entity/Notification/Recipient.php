<?php

declare(strict_types=1);

namespace Phant\Notifier\Entity\Notification;

use Phant\DataStructure\Web\EmailAddress;
use Phant\DataStructure\Web\EmailAddressAndName;
use Phant\Notifier\Entity\Transport\Channel;

class Recipient
{
    public function __construct(
        public readonly string|EmailAddress|EmailAddressAndName $value
    ) {
    }

    public function isCompliantWithChannel(
        Channel $channel
    ): bool {
        switch ($channel) {
            case Channel::Email:
                if (is_a($this->value, EmailAddress::class)) {
                    return true;
                }
                if (is_a($this->value, EmailAddressAndName::class)) {
                    return true;
                }

                return false;
                break;
        }

        return true;
    }
}
