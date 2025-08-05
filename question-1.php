<?php

// The following function accepts a nullable string, and returns the capitalized version of the string, if it is not null.
// Optimize the function using PHP 8+ features and code styles.

class DoSomething
{
    public function Capitalize( ?string $string = null )
    {
        if ( $string === null )
        {
            return "";
        }
        else
        {
            return ucwords( $string );
        }
    }
}
