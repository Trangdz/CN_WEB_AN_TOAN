<?php
function checkMail($email)
{
    if (empty($email)) {
        return "You can't to left blank this field!";
    }
}

function getBody()
{
    $bodyArr = [];
    if (!empty($_GET)) {
        foreach ($_GET as $key => $value) {
            $key=strip_tags($key);
            if(is_array($value)){
                $bodyArr[$key]=filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);  
            }
            else{
                $bodyArr[$key]=filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
            
        }
    }
    if(!empty($_POST))
    {
        foreach($_POST as $key => $value){
            $key=strip_tags($key);
            if(is_array($value))
            {
                $bodyArr[$key]=filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
            }
            else{
                $bodyArr[$key]=filter_input(INPUT_POST, $key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
    }
    return $bodyArr;
}

