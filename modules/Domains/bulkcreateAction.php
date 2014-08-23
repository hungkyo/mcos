<?php
$mode = "Bulk Create";
if ($_POST['submit']) {
	// ajax!
	$sessionMessage = getModel("Core_Session_Message");
	$domains = $_POST['domains'];
	$active = $_POST['active'];
	$installed = $_POST['installed'];
	$servers = getModel("server")->getAll()->addSelect('entity_id')->load();
	$serverIds = array();
	foreach ($servers AS $server){
		$serverIds[] = $server->getId();
	}
	$domains = explode("\n",$domains);
	$count = 0;
	foreach ($domains AS $domainName){
		$domainName = trim($domainName);
		$domainName = strtolower($domainName);
		if($domainName){
			$domain = getModel("domain");
			$domain->setData('name',$domainName)
				->setData('active',$active)
				->setData('installed',$installed)
				->setData('server',$serverIds[mt_rand(0,count($serverIds)-1)]);
			$domain->save();
			$count++;
		}

	}
	$sessionMessage->addSuccess("$count domain(s) were added!");
	$sessionMessage->addRedirect("index.php?module=" . $_GET['module']);
	exit;
}
?>
<div class="col-md-6">
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo ucwords($mode) ?> Domain</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form"
		      action="?module=<?php echo $_GET['module'] ?>&action=<?php echo $_GET['action'] ?><?php echo $_GET['id'] ? "&id={$_GET['id']}" : '' ?>">
			<div class="box-body">
				<div class="form-group">
					<label for="domains">Domain name</label>
					<textarea id="domains" class="form-control" rows="10" placeholder="E.g: google.com
google2.com.vn
..."></textarea>
				</div>
				<b>Server: Random!</b>
				<div class="form-group">
					<label for="active">Active</label>
					&nbsp;&nbsp;&nbsp;<input type="checkbox" id="active"
					                         value="1" <?php echo is_object($curDomain) ? ($curDomain->getData('active') <> 0 ? 'checked' : '') : '' ?> />
				</div>
				<div class="form-group">
					<label for="installed">Installed?</label>
					&nbsp;&nbsp;&nbsp;<input type="checkbox" id="installed"
					                         value="1" <?php echo is_object($curDomain) ? ($curDomain->getData('installed') <> 0 ? 'checked' : '') : '' ?> />
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