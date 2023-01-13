# Notifier

## Requirements

PHP >= 8.1


## Install

`composer require phant/notifier`

## Usages

```php
use Phant\Notifier\Service\Handler as NotifierHandler;
use Phant\Notifier\Entity\Notification\Action as NotificationAction;
use Phant\Notifier\Entity\Notification\Type as NotificationType;
use Phant\Notifier\Factory\Notification as NotificationFactory;
use Phant\Notifier\Factory\Notification\Content as NotificationContentFactory;
use Phant\Notifier\Entity\Transport\Channel;
use Phant\Notifier\Entity\Transport\Collection as NotifierTransportCollection;
use Phant\Notifier\Entity\Transport\Email as NotifierTransportEmail;
use App\EmailBuilder;
use App\EmailSender;

$notifierHandler = new NotifierHandler(
	(new NotifierTransportCollection())
		->add(
			new NotifierTransportEmail(
				new EmailBuilder(),
				new EmailSender(),
				'user@domain.ext',
				'Best app'
			)
		)
);

$notifierHandler->dispatch(
	NotificationFactory::make(
		NotificationType::Information,
		NotificationContentFactory::make(
			'Hello world!',
			'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			[
				'Foo' => 'Bar'
			]
		),
		new NotificationAction(
			'https://domain.ext/path',
			'Action'
		),
		'john.doe@domain.ext'
		Channel::Email
	)
);
```
