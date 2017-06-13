<?php

if(!function_exists('PS_faker_gen_str')){
    function PS_faker_gen_str(){
        $faker = \Faker\Factory::create();
        // return('default something else ');
        return 'PS_faker_gen_str '. $faker->email . $faker->name . $faker->realText();
    }
}



if(!function_exists('PS_faker')){
    function PS_faker(){
        $faker = \Faker\Factory::make();
        // return('default something else ');
        return $faker->email . $faker->name . $faker->realText();
    }
}

// example validation function to pass to valid()

if(!function_exists('PS_maxLength')){
    function PS_maxLength($len) {
        $func = function ($value) use ($len) {
            return strlen($value) <= $len;
        };
        return $func;
    }
}


if(!function_exists('PS_minLength')){
    function PS_minLength($len) {
        $func = function ($value) use ($len) {
            return strlen($value) >= $len;
        };
        return $func;
    }
}