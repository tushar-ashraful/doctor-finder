<?php
// date Time Format 
if (! function_exists('myDateTime')) {
    function myDateTime($value, $time = false) {
        if ($value == null) {
           return null;
        }
    	$format = $time ? 'd F Y  h:i a' : 'd F Y';
       return \Carbon\Carbon::parse($value)->format($format);
    }
}

// input type date calander          
if (! function_exists('inputCalander')) {
    function inputCalander($value, $time = false) {
      $format = $time ? 'Y-m-d  h:i a' : 'Y-m-d';
       return \Carbon\Carbon::parse($value)->format($format);
    }
}

// taka format in amount
if (! function_exists('tkFormat')) {
    function tkFormat($value, $point = false) {
       return number_format($value, $point ? 2 : 0)." Tk.";
    }
}

// input select option selected check 
if (! function_exists('selected')) {
    function selected($value, $compareValue) {
       return $value == $compareValue ? 'selected' : '';
    }
}

// input select option selected check 
if (! function_exists('returnMassage')) {
    function returnMassage($value, $massage=null) {
      if ($value) {
         return redirect()->back()->with('success',$massage);
      }
      return redirect()->back()->with('error',$massage ? $massage : 'Try agin!');
    }
}

// Checks if time has expired at the current time or DateTime
if (! function_exists('timeIsOver')) {
    function timeIsOver($value, $time = false) {
        $format = $time ? 'Y-m-d  h:i' : 'Y-m-d';
        $value = \Carbon\Carbon::parse($value)->format($format);
        $current = now()->format($format);
        if ($value < $current) {
           return true;
        }
        return false;
    }
}

// status dore count kora jabe without query , just only query 
if (! function_exists('countWithStatus')) {
    function countWithStatus($model, $status, $column) {
     return count(array_filter($model->toarray(), function($item) use ($status, $column){
         return $item[$column] ==  $status;
     }));                
    }
}
