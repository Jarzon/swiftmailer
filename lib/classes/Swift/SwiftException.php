<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Base Exception class.
 *
 * @author Chris Corbyn
 */
class Swift_SwiftException extends Exception
{
    /**
     * Create a new SwiftException with $message.
     *
     * @param string $message
     * @param int    $code
     */
    public function __construct($message, $code = 0, Exception|null $previous = null)
    {
        if($code === null) $code = 0;
        parent::__construct($message, $code, $previous);
    }
}
