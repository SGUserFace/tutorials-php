<?php

$week= new DateTime('+1 week');

// in can be accessed by document.cookie
setcookie('key_bad_cookie','value_bad_cookie',$week->getTimestamp());


// in cannot be accessed by document.cookie
setcookie('key_good_cookie','value_good_cookie',$week->getTimestamp(),'/',null,null,true);


/*



 */