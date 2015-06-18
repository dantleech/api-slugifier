Symfony CMF API
===============

This package contains an interface for slugifier/urlizer implementations. The
aim is to enable slugifiers implementations to be reused both within the
Symfony CMF components and with the wider community.

Usage
-----

If your class requires a slugifier:

````php

use Symfony\Cmf\Api\Slugifier\SlugifierInterface;

class SomeUrlWriter
{
    private $slugifier;

    public function __construct(SlugifierInterface $slugifier)
    {
        $this->slugifier = $slugifier;
    }

    public function generate($string)
    {
        return $this->slugifier->slugify($string);
    }
}
````

Callback Slugifier
------------------

This package includes a callback slugifier which enables you to use slugifier
implementations which do not implement this interface:

For example, take the following fictional urlizer:

````php
class DoNothingUrlizer
{
    public static function urlize($string, $delimiter = '-')
    {
        return $string;
    }
}
````

You can use this through the Callback slugifier as follows:

````php
$slugifier = new CallbackSlugifier('DoNothingUrlizer::urlize');
$slugified = $slugifier->slugify('slugify me');
````

The callback slugifier uses `call_user_func` internally and can accept any
[php callable](http://php.net/manual/en/language.types.callable.php).
