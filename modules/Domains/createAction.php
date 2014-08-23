<?php
$mode = "Create";
$curDomain = false;
if ($_GET['id']) {
	$curDomain = getModel("domain")->load($_GET['id']);
	$mode = "Edit";
}
if ($_POST['submit']) {
	// ajax!
	$sessionMessage = getModel("Core_Session_Message");
	if (!is_object($curDomain)) $curDomain = getModel("domain");
	foreach ($_POST AS $k => $v) {
		if ($k <> 'submit') {
			$curDomain->setData($k, $v);
		}
	}
	$curDomain->save();
	$sessionMessage->addSuccess("All change(s) were saved!");
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
					<label for="name">Domain name</label>
					<input type="text" class="form-control" id="name" placeholder="E.g: google.com"
					       value="<?php echo is_object($curDomain) ? $curDomain->getData('name') : '' ?>"/>
				</div>
				<div class="form-group">
					<label for="server">Server</label>
					&nbsp;&nbsp;&nbsp;<select id="server">
						<?php
						$servers = getModel("server")->addSelect('ip, entity_id')->getAll()->load();
						foreach ($servers AS $server) {
							?>
							<option
								value="<?php echo $server->getId() ?>" <?php echo is_object($curDomain) ? ($server->getId() == $curDomain->getData('server') ? 'selected' : '') : '' ?>><?php echo $server->getData('ip'); ?></option>
						<?php
						}
						?>
					</select>

				</div>

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