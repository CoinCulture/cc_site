<?php 

// receive webhook from github and pull
if ( $_POST['payload'] ) {
  shell_exec( 'cd /coinculture/ && git reset --hard HEAD && git pull origin master' );
}

?>
