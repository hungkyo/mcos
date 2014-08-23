<?php
$mode = "Create";
$curServer = false;
if ($_GET['id']) {
	$curServer = getModel("server")->load($_GET['id']);
	$mode = "Edit";
}
if ($_POST['submit']) {
	// ajax!
	$sessionMessage = getModel("Core_Session_Message");
	if(!is_object($curServer)) $curServer = getModel("server");
	foreach($_POST AS $k=>$v){
		if($k <> 'submit'){
			$curServer->setData($k,$v);
		}
	}
	$curServer->save();
	$sessionMessage->addSuccess("All change(s) were saved!");
	$sessionMessage->addRedirect("index.php?module=" . $_GET['module']);
	exit;
}
?>
<div class="col-md-6">
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo ucwords($mode)?> Server/Host</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" action="?module=<?php echo $_GET['module']?>&action=<?php echo $_GET['action']?><?php echo $_GET['id']?"&id={$_GET['id']}":''?>">
			<div class="box-body">
				<div class="form-group">
					<label for="ip">Server IP</label>
					<input type="text" class="form-control" id="ip" placeholder="E.g: 127.0.0.1" value="<?php echo is_object($curServer)?$curServer->getData('ip'):''?>" />
				</div>
				<div class="form-group">
					<label for="dbuser">DB User</label>
					<input type="text" class="form-control" id="dbuser" placeholder="E.g: root" value="<?php echo is_object($curServer)?$curServer->getData('dbuser'):''?>" />
				</div>
				<div class="form-group">
					<label for="dbpass">DB Password</label>
					<input type="password" class="form-control" id="dbpass" placeholder="E.g: rootpass" value="<?php echo is_object($curServer)?$curServer->getData('dbpass'):''?>" />
				</div>
				<div class="form-group">
					<label for="ftpuser">FTP User</label>
					<input type="text" class="form-control" id="ftpuser" placeholder="E.g: root" value="<?php echo is_object($curServer)?$curServer->getData('ftpuser'):''?>" />
				</div>
				<div class="form-group">
					<label for="ftppass">FTP Password</label>
					<input type="password" class="form-control" id="ftppass" placeholder="E.g: rootpass" value="<?php echo is_object($curServer)?$curServer->getData('ftppass'):''?>" />
				</div>
				<div class="form-group">
					<label for="active">Active</label>
					&nbsp;&nbsp;&nbsp;<input type="checkbox" id="active" value="1" <?php echo is_object($curServer)?($curServer->getData('active')<>0?'checked':''):''?> />
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
	<!-- /.box -->
</div>