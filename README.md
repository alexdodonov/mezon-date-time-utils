

# Utilities for data manipulation

## Installation

Just print

```
composer require mezon/date-time-utils
```

## Locale setup

You can specify necessary locale by setting up the DateTimeUtils::$locale variable. For example:

```php
DateTimeUtils::$locale = 'en';
```

## Methods

Method returns true if the passed date is today

```php
DateTimeUtils::isToday(string $date):bool
```

Method returns true if the passed date was yesterday

```php
DateTimeUtils::isYesterday(string $date):bool
```

Method returns day and literal representation of month from the date. For example the string "1 of july" will be returned for the date '2020-07-01'

```php
DateTimeUtils::dayMonth(string $date): string
```

