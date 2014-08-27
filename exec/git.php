<?php
file_put_contents("x.txt",var_export($_POST,true));
if ($_POST['payload']) {
	shell_exec('cd /var/www/mcos && git pull');
}
