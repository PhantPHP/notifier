<?php

declare(strict_types=1);

namespace Phant\Notifier\Factory\Notification;

use Phant\Error\NotCompliant;
use Phant\DataStructure\Web\EmailAddress;
use Phant\DataStructure\Web\EmailAddressAndName;
use Phant\Notifier\Entity\Notification\Recipient as RecipientEntity;
use Phant\Notifier\Entity\Transport\Channel;

class Recipient
{
    public static function make(
        mixed $value,
        Channel $channel
    ): RecipientEntity {
        switch ($channel) {
            case Channel::Email:
                if (is_string($value)) {
                    return new RecipientEntity(
                        new EmailAddress($value)
                    );
                }

                if (is_a($value, EmailAddress::class)) {
                    return new RecipientEntity(
                        $value
                    );
                }
                if (is_a($value, EmailAddressAndName::class)) {
                    return new RecipientEntity(
                        $value
                    );
                }

                break;
        }

        throw new NotCompliant('Recipient must be compliant with channel');
    }
}
