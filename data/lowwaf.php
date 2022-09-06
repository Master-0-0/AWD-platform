<?php
function inject_check_sql($sql_str) {

     return preg_match('/select|from|union|where|order by|and|or|not|in|\^|insert|=|like|regexp|<|>|!|between|update|\'|\"|;|into|load_file|outfile|database|information|desc|show|limit|ord|ascii|bin|substring|length|substr|sleep|if|SCHEMATA|concat|strcmp|left|benchmark/i',$sql_str);
} 
function verify_str($str) { 
	  $str=addslashes($str);
       if(inject_check_sql($str)) {
           echo "<script>alert('想扣分吗？')</script>";
        } 
    return $str;
} 
function test_input($data) { 
      //$data = str_replace("%", "percent", $data);
      $data = trim($data);
     //$data = stripslashes($data);
      $data = htmlspecialchars($data,ENT_QUOTES);
      return $data;
}
//test_input(verify_str());
//echo verify_str(test_input($_GET['test']));
?>
