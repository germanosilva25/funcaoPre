function pre($arr, $exit = false, $line = false, $return = false) {
    $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);$r = '';$i = 0;
    if ($line and isset($backtrace[1]) and is_array($backtrace[1])) $i = 1;
    if ($line and isset($backtrace[$i]) and is_array($backtrace[$i]))
        $r = nl2br("{$backtrace[$i]['file']}:{$backtrace[$i]['line']}\n\n");
    if (is_array($arr) or gettype($arr)==='object') $r .= '<pre>' . print_r($arr,1) . '</pre>';
    elseif (gettype($arr)==='string' and json_decode($arr, true)) $r .= '<pre>' . print_r(json_decode($arr, true),1) . '</pre>';
    else $r .= $arr;
    if ($return) return $arr;
    echo $r,($exit?exit:'');
}
