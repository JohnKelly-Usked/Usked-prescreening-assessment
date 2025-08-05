<?php

// describe why the following code is 'evil', or poor practice.

function DoStuff()
{
    // do first task

    $wait = 1000000;

    for( $i=0; $i<$wait; $i++ )
    {
        // stall
    }

    // do second task
}
