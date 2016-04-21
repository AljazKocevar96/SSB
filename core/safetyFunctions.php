<?php
function safeString($string){
    return strip_tags(preg_replace('/[^a-zA-Z0-9ČĆŽŠĐčćžđš@!:;?=\'\,()*\/_|+\.-] /' , '' , $string));
}

function CKEditorSafety($string){
    return preg_replace('<script>','',$string);
}
?>