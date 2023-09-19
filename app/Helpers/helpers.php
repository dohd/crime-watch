<?php
use Illuminate\Support\Str;



if (!function_exists('numberClean')) {

    /**
     * @return bool
     */
    function numberClean($number)
    {
        $precision_point = 2;
        $decimal_sep = '.';
        $thousand_sep = ',';
        $number = str_replace($thousand_sep, "", $number);
        $number = str_replace($decimal_sep, ".", $number);
        $format = '%.' . $precision_point . 'f';
        $number = sprintf($format, $number);
        return $number;
    }
}
function date_for_database($input)
{
    $timestamp = strtotime($input);
   if($timestamp) {
       $date = new DateTime($input);
       //$date->modify('+1 day');
       $date = $date->format('Y-m-d');
       return $date;
   }
   else return null;
}

function datetime_for_database($input)
{
    $date = new DateTime($input);
    $date = $date->format('Y-m-d H:i:s');
    return $date;
}

function time_for_database($input)
{
    $date = new DateTime($input);
    $date = $date->format('H:i:s');
    return $date;
}

function amountFormat($number = 0, $currency = null)
{
    if (!$currency) {
        $precision_point = config('currency.precision_point');
        $decimal_sep = config('currency.decimal_sep');
        $thousand_sep = config('currency.thousand_sep');
        $symbol_position = config('currency.symbol_position');
        $symbol = config('currency.symbol');

    } 

    $number = number_format($number, $precision_point, $decimal_sep, $thousand_sep);
    if ($symbol_position) {
        return $symbol . ' ' . $number;
    } else {
        return $number . ' ' . $symbol;
    }
}

function numberFormat($number = 0, $currency = null, $precision_point_off = false)
{
    if (!$currency) {
        $precision_point = config('currency.precision_point');
        $decimal_sep = config('currency.decimal_sep');
        $thousand_sep = config('currency.thousand_sep');
    }
    if ($precision_point_off) $precision_point = 0;
    $number=(float)$number;
    $number = number_format($number, $precision_point, $decimal_sep, $thousand_sep);
    return $number;
}

function dateFormat($date = '', $local = false)
{
    if ($local AND strtotime($date)) return date($local, strtotime($date));
    if (strtotime($date)) return date('d-m-Y', strtotime($date));
    return date('d-m-Y');
}


function dateTimeFormat($date = '', $local = false)
{
    if ($local) return date($local, strtotime($date));
    if ($date) return date('d/m/y H:i', strtotime($date));
}

function timeFormat($date = '')
{
    if ($date) return date('H:i:s', strtotime($date));
}
function encrypt_data($data = '')
{
   return base64_encode(base64_encode(base64_encode(strrev($data))));
}

function decrypt_data($data = '')
{
    return strrev(base64_decode(base64_decode(base64_decode($data))));
}
function token_validator($request_token, $data, $return_token = false)
{

    $valid_token = hash_hmac('ripemd160', $data, config('master.key'));
    if ($return_token) return $valid_token;
    if (hash_equals($request_token, $valid_token)) return true;
    return false;
}

function getHashCode()
{
  return bin2hex(openssl_random_pseudo_bytes(20));
}

 function makeSlug($title, $hash = FALSE)
{
   
    $slug =Str::slug($title,'-');
    
    

        if(!$hash){
            $slug=$slug.'-'.getHashCode();

        }else{
            $slug=getHashCode();
        }

   
    return  $slug;
}

function generateSerialNumber(int $id)
{
    $start = 0; // 0 = A, 702 or 703 = AAA, adjust accordingly
    $letters_value = $start + (ceil($id / 999) - 1);
    $numbers = ($id % 999 === 0) ? 999 : $id % 999;

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $base = strlen($characters);
    $letters = '';

    // while there are still positive integers to divide
    while ($letters_value) {
        $current = $letters_value % $base;
        $letters = $characters[$current] . $letters;
        $letters_value = floor($letters_value / $base);
    }

return $letters.'-'.sprintf('%03d', $numbers);
}


function generateProductSku($sku_prefix,$string)
{

    return $sku_prefix . str_pad($string, 4, '0', STR_PAD_LEFT);
}

 function downloadFile($file)
    {
    	$myFile = public_path("uploads/".$file);


    	return response()->download($myFile);
    }

    function form_return($val)
{
    if (empty($val)) return 0;
    return $val;
}


function dorDateFormat($date)
{
    return date('l, F j,Y',strtotime($date . "+1 days"));
}


function monthFormat($date = '', $local = false)
{
    return date('m-Y', strtotime($date));
}

if (!function_exists('browserLog')) {
    function browserLog(...$args)
    {
        foreach ($args as $arg) {
            echo '<script>console.log(' . json_encode($arg) . ')</script>';
        }
    }
}

if (!function_exists('printLog')) {
    function printLog(...$args)
    {
        foreach ($args as $arg) {
            error_log(print_r($arg, 1));
        }
    }
}

if (!function_exists('databaseArray')) {
    function databaseArray($input=[])
    {
        $input_mod = [];
        foreach ($input as $key => $value) {
            foreach ($value as $j => $v) {
                $input_mod[$j][$key] = $v;
            }
        }
        return $input_mod;
    }
}

if (!function_exists('fillArray')) {
    function fillArray($main=[], $params=[])
    {
        foreach ($params as $key => $value) {
            $main[$key] = $value;
        }
        return $main;
    }
}

if (!function_exists('fillArrayRecurse')) {
    function fillArrayRecurse($main=[], $params=[])
    {
        foreach ($main as $i => $row) {
            foreach ($params as $key => $value) {
                $main[$i][$key] = $value;
            }
        }
        return $main;
    }
}
