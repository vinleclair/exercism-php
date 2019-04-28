<?php

function from(DateTime $bd): DateTime 
{
    return (clone $bd)->add(new DateInterval('PT1000000000S'));
}
