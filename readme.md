# ACF Configurator

__A wrapper for easy local Advanced Custom Fields configuration in php.__

ACF Configurator comes into play when you want to define Advanced Custom Fields groups in PHP and not via database. Since ACFs standard way of configuration is a long multidimensional array, it gets confusing very fast. ACF Configurator provides an easy, intuive way to configure ACF groups and fields. It uses a short, OOP oriented syntax for configuration.

## Why not use the Advanced Custom Fields GUI?

The Advanced Custom Fields plugin provides a nice interface which is convenient for managing groups and fields in WordPress. Even clients can easily edit field with little knowledge. But configuration via PHP has some advantages:
- __No loading from database.__ Configuration is not stored in database anymore and does not need to be fetched every time the page loads.
- __Couple code and configuration.__ Configuration does not belong into a database. Custom fields and the themes codebase are usually coupled together tightly. Changing fields without updating the code will probalby break things.
- __Easier migration.__ If a theme needs an update you usually test it in an development environment first. Transferring all the changes you made to your live site before deploying your new code, can break things, or at least is really annoying.


## Installation

Install this package via Composer:

```
composer require pxlrbt/acf-confgurator
```

## Usage (Example)

Just import ACF Configurator and start configuration. Group class takes care of registration.

```php
Group::make('Test group', 'test')
    ->location(function($condition) {
        $condition->if(Location::$PARAM_POST_TEMPLATE, Location::$OPERATOR_EQUALS, 'template.php')
            ->andIf(Location::$PARAM_POST_TYPE, Location::$OPERATOR_EQUALS, 'page');
    })
    ->fields([
        Text::make('Text field', 'text')
            ->placeholder('Placeholder')
            ->required(true),

        TrueFalse::make('Show email?', 'show_email')
            ->select2(true),

        Email::make('Email address', 'email')
            ->condition(function($condition) {
                $condition->if('field_show_email', Condition::$OPERATOR_EQUALS, true);
            })
            ->required(true)
            ->placeholder('your-email@example.com'),

        Repeater::make('Items', 'items')
            ->fields([
                Textfield::make('Description', 'description'),
                Image::make('Image', 'item__image')
                    ->returnFormat(Image::$FORMAT_ID)
            ])
    ])
    ->hide(Group::$HIDE_EDITOR)
    ->hide(Group::$HIDE_TRACKBACKS);
```


## Alternatives

This plugin doesn't fit your needs? Here are two alternatives:

- [ACF Code Helper by RadoslavGeorgiev](https://github.com/RadoslavGeorgiev/acf-code-helper/wiki)
- [ACF Builder by StoutLogic](https://github.com/StoutLogic/acf-builder)

## Contributing

Contribution to this project is appreciated. Feel free to add non-standard field types or suggest improvements.