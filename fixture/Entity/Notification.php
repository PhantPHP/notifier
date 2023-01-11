<?php

declare(strict_types=1);

namespace Fixture\Entity;

use Phant\Notifier\Entity\Channel;
use Phant\Notifier\Entity\Channel\Collection as ChannelCollection;
use Phant\Notifier\Entity\Notification as NotificationEntity;
use Phant\Notifier\Entity\Notification\Action;
use Phant\Notifier\Entity\Notification\Recipient;

final class Notification
{
    public static function get(): NotificationEntity
    {
        return self::getEmail();
    }

    public static function getEmail(): NotificationEntity
    {
        return new NotificationEntity(
            (new ChannelCollection())
                ->add(
                    Channel::Email
                ),
            'Hello world!',
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            new Action(
                'https://domain.ext/path',
                'Action'
            ),
            new Recipient(
                'john@doe.com',
                'John DOE'
            )
        );
    }

    public static function getChat(): NotificationEntity
    {
        return new NotificationEntity(
            (new ChannelCollection())
                ->add(
                    Channel::Chat
                ),
            'Hello world!',
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            new Action(
                'https://domain.ext/path',
                'Action'
            ),
            null
        );
    }

    public static function getEmailNoRecipient(): NotificationEntity
    {
        return new NotificationEntity(
            (new ChannelCollection())
                ->add(
                    Channel::Email
                ),
            'Hello world!',
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            new Action(
                'https://domain.ext/path',
                'Action'
            ),
            null
        );
    }

    public static function getEmailRecipientInvalidId(): NotificationEntity
    {
        return new NotificationEntity(
            (new ChannelCollection())
                ->add(
                    Channel::Email
                ),
            'Hello world!',
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            new Action(
                'https://domain.ext/path',
                'Action'
            ),
            new Recipient(
                'john(at)doe.com',
                'John DOE'
            )
        );
    }

    public static function getPush(): NotificationEntity
    {
        return new NotificationEntity(
            (new ChannelCollection())
                ->add(
                    Channel::Push
                ),
            'Hello world!',
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            new Action(
                'https://domain.ext/path',
                'Action'
            ),
            null
        );
    }

    public static function getSms(): NotificationEntity
    {
        return new NotificationEntity(
            (new ChannelCollection())
                ->add(
                    Channel::Sms
                ),
            'Hello world!',
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            new Action(
                'https://domain.ext/path',
                'Action'
            ),
            null
        );
    }
}
