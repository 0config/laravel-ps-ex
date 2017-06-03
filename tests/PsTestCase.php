<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class PsTestCase extends BaseTestCase
{
    use CreatesApplication;


    public static function assert_ps_isEmail($email, $message = '')
    {

        $message = ($message == '') ? ' invalid email ' : $message;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

            $ps_result = true;
        } else {
            $ps_result = false;

        }

        static::assertThat($ps_result, static::isTrue(), $message);
    }

    public static function assert_ps_isNotEmail($email, $message = '')
    {


        $message = ($message == '') ? ' valid email address.. this should return invalid email ' : $message;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

            $ps_result = true;
        } else {
            $ps_result = false;

        }

        static::assertThat($ps_result, static::isFalse(), $message); // is false
    }

    /**
     * @param $in_value
     * @param int $in_check_minLen
     * @param $in_type
     * @param string $message
     */
    public static function assert_ps_type($in_value, $in_check_minLen = 0, $in_type, $message = '')
    {
        // available i, f, s, e, u
        switch ($in_type) {
            case 'e':
                $filter_type = FILTER_VALIDATE_EMAIL;
                $message = ($message == '') ?  $in_value . ' is not a valid email' : $message;
                break;
            case 'u':
                $filter_type = FILTER_VALIDATE_URL;
                $message = ($message == '') ?  $in_value . ' is not a valid URL' : $message;
                break;

            case 'f':
                $filter_type = FILTER_VALIDATE_FLOAT;
                $message = ($message == '') ?  $in_value . ' is not a valid Float' : $message;
                break;

            case 'i':
                $filter_type = FILTER_VALIDATE_INT;
                $message = ($message == '') ?  $in_value . ' is not a valid Integer' : $message;
                break;


            default:
                $filter_type = false;
        }


        if (!filter_var($in_value, $filter_type) === false) {
            $ps_result = true;
        } else {
            $ps_result = false;

        }
        if ($filter_type == false) { // if filter type == false means.. default type
            $ps_result = true; // no filter validation required
        }
        if (strlen($in_value) < $in_check_minLen) {
            $ret_minLen = false;
            $message = 'MINIMUM LENGTH ERROR : required LENGTH=' . $in_check_minLen. ', current LENGTH=' .  strlen($in_value) . ' [ ' . $in_value . ' ]'  ;
        } else {
            $ret_minLen = true;
        }
        if (($ps_result == true) and ($ret_minLen == true)) { // checks both are true or not
            $ret = true;
        } else {
            $ret = false;
        }

        static::assertThat($ret, static::isTrue(), $message); // is false
    }


}
