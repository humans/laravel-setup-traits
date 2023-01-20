# Laravel Setup Traits

---

**Laravel now has this built-in!**

---

This package allows traits to be ran automatically on the setup of your tests.

Here's an example.

```php
class PostUpdateTest extends TestCase
{
    use ActingAsEdtior;
}

trait ActingAsEditor
{
    function setupActingAsEditor()
    {
        $this->editor = factory(User::class)->states('editor');
      
        $this->be($this->editor);
    }
}
```

## Installation

Require the package via composer.

```
composer require humans/laravel-setup-traits --dev
```

Use the trait in your base test case.

```php
use Humans\SetupTraits\SetupTraits;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use SetupTraits;
}
```

Create a trait you want with the method name `setup` + `class name`

```php
use Illuminate\Support\Facades\Notification;

trait	WithoutNotifications
{
    function setupWithoutNotifications
    {
        Notification::fake();
    }
}
```

Then include the trait in any of your tests!

```php
class SettingsUpdateTest extends TestCase
{
    use WithoutNotifications;
}
```

