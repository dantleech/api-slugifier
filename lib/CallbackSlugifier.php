<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2015 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Api\Slugifier;

/**
 * Slugifier service which uses a callback
 */
class CallbackSlugifier implements SlugifierInterface
{
    /**
     * @var \Closure
     */
    protected $callback;

    /**
     * @see http://php.net/manual/en/language.types.callable.php
     *
     * @param mixed $callback
     */
    public function __construct($callback)
    {
        $this->callback = $callback;
    }

    /**
     * {@inheritDoc}
     */
    public function slugify($string)
    {
        return call_user_func($this->callback, $string);
    }
}
