<?php
/* create text slug */
function create_text_slug($text = ''){
    if(empty($text))
     return '';
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
}
/* specifies if value is integer (not double, float...) */
function isint($value)
{
  if (!is_numeric($value)) {
    return false;
  }
  $doublevalue = doubleval($value);
  $intvalue = intval($value);
  if ($doublevalue == $intvalue) {
    return $intvalue;
  }
  return false;
}
/* get printable money string in toman */
function get_printable_price_in_toman($price = '')
{
  if (empty($price) || is_null($price))
    return 0;
  if (!is_numeric($price))
    return 0;
  return number_format($price, 0, null, ',') . ' Toman';
}
/* log error | exception */
function log_throwable(\Throwable $th){
  /* actual log operation... */
}

function array_find($array, $callable)
{
  $result = array_filter($array, $callable);
  if (count($result)) {
    return current($result);
  }
  return null;
}