<?php 

// receive webhook from github and pull
// TODO: authenticate the payload
shell_exec( 'cd /coinculture/ && git fetch -a origin && git reset --hard origin/master' );

?>
