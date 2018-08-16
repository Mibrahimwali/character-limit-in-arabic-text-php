<?php //this condition is created because ARABIC text was not limiting to desired limit in post.
if(ICL_LANGUAGE_CODE == 'en'){ echo limit_text($cat_desc, '20', 'en');}
else{ echo limit_text($cat_desc, '20', 'ar');} 

function limit_text($text, $limit, $lang) {
  if($lang == 'en'){
    if (str_word_count($text, 0) > $limit) { //in this code checking count of english strings, by Ibrahim 
        $words = str_word_count($text, 2); //check for word count using php default function
        $pos = array_keys($words); //get keys of words from $words
        $text = substr($text, 0, $pos[$limit]) . '...'; //get sentance with word limit as per requirement
    }
  }
  else{ //in this code checking count of arabic strings, by Ibrahim 
    if (mb_strlen($text, 'utf8') > "10") {
    $words = explode(" ",$text); //explode words by space, 
    //   $pos = array_values($words);
    $pos = mb_strpos($text, $words[$limit]); //getting word as per required limit, and getting its position
    $text = mb_substr($text, 0, $pos, 'UTF-8') . '...'; //subtracting string from 0 to position of word in $pos and storing it in $text
  }
    //$text = mb_strlen($text, 'utf8'); //substr($text, 0, $limit+100) . '...ar';
  }
    return $text;
}

?>
