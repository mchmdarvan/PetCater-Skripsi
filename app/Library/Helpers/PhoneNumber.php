<?php

use Propaganistas\LaravelPhone\PhoneNumber;

function makePhoneNumber($phone_number)
{
    $country = config('myedusolvex.phone_locale');
    return (string) PhoneNumber::make($phone_number, $country);
}
