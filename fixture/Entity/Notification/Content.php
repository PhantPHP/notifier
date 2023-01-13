<?php

declare(strict_types=1);

namespace Fixture\Entity\Notification;

use Phant\Notifier\Entity\Notification\Content as ContentEntity;
use Phant\Notifier\Entity\Notification\Content\Body;
use Phant\Notifier\Entity\Notification\Content\Metadatas;
use Phant\Notifier\Entity\Notification\Content\Subject;

final class Content
{
    public static function get(): ContentEntity
    {
        return new ContentEntity(
            new Subject(
                'Hello world!'
            ),
            new Body(
                'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
            ),
            (new Metadatas())
                ->add('Foo', 'Bar')
        );
    }
}
