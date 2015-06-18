<?php

namespace Symfony\Cmf\Api\Slugifier;

use Symfony\Cmf\Api\Slugifier\SlugifierInterface;
use Symfony\Cmf\Api\Slugifier\CallbackSlugifier;

class CallbackSlugifierTest extends \PHPUnit_Framework_TestCase
{
    private $slugifier;

    public function setUp()
    {
        $this->slugifier = new CallbackSlugifier(array($this, 'slugify'));
    }

    /**
     * It should use a callback to slugifiy a string
     */
    public function testSlugifier()
    {
        $this->assertEquals(
            'slug-hello',
            $this->slugifier->slugify('hello')
        );
    }

    public function slugify($string)
    {
        return 'slug-' . $string;
    }
}
