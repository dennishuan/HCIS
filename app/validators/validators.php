<?php

Validator::extend('alpha_spaces', function($attribute, $value)
{
    return preg_match('/^[\pL\s\.\-]+$/u', $value);
});

Validator::extend('valid_phone', function($attribute, $value, $parameter)
{
    return preg_match("/^([0-9\s\-\+\(\)\'x']*)$/", $value);
});

Validator::extend('date_time', function($attribute, $value, $parameter)
{
    return preg_match("/^([0-9\s\-\:]*)$/", $value);
});