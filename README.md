<h1 align="center">PHP Enum Helpers</h1>
<p align="center">
    <a href="https://packagist.org/packages/yungts97/enum-helpers">
        <img src="https://img.shields.io/packagist/v/yungts97/enum-helpers?color=24BDCC"/>
    </a>
    <a href="https://github.com/yungts97/enum-helpers/blob/main/LICENSE.md">
        <img src="https://img.shields.io/packagist/l/yungts97/enum-helpers"/>
    </a>
    <a href="https://packagist.org/packages/yungts97/enum-helpers">
        <img src="https://img.shields.io/packagist/dt/yungts97/enum-helpers?color=ff69b4"/>
    </a>
    <a href="https://github.com/yungts97/enum-helpers/actions">
        <img src="https://github.com/yungts97/enum-helpers/workflows/CI/badge.svg"/>
    </a>
</p>

`yungts97/enum-helpers` is a PHP package that extended functionality of the PHP Enumeration. 

## 📦 Environment Requirements
`PHP`: ^8.1

## 🚀 Installation
You can install the package via composer:
```bash
composer require yungts97/enum-helpers
```


## ✨ How to use?
This package is very simple and easy to use. To extend the features of enum. You can add the trait in your enum.
```php
use Yungts97\EnumHelpers\Traits\Invokable;
use Yungts97\EnumHelpers\Traits\Contains;
use Yungts97\EnumHelpers\Traits\Random;

enum Status: string
{
    use Invokable, Contains, Random; // add it here

    case Draft = 'draft';
    case Submitted = 'submitted';
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
}
```
### 1. Invokable
This trait allows Enum to be invokable.
```php
Status::Pending() // "pending"
```

### 2. Contains
This trait allows checking whether the value exists in Enum. Agrument accepted `UnitEnum`, `BackedEnum`, `String` and `Int`.
```php
Status::contains('pending') // true 
Status::contains(Status::Draft) // true
Status::contains(Status::Refund) // false 
```

### 3. Random
This trait allows Enum to return random value(s).
```php
Status::random() // Status::Draft 
Status::random(1) // Status::Draft
Status::random(2) // [Status::Draft, Status::Approved]
```

## 📃 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
