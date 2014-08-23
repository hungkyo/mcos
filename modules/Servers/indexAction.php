<?php
$servers = getModel("server")->getAll()->load();
if (count($servers)) {
	?>
	<div class="box-body table-responsive">
		<table id="example2" class="table table-bordered table-hover">
			<thead>
			<tr>
				<th>ID</th>
				<th>IP</th>
				<th>Active</th>
				<th>Edit</th>
			</tr>
			</thead>
			<tbody>


			<?php
			foreach ($servers AS $server) {
				?>
				<tr>

					<td><?php echo $server->getData('entity_id') ?></td>
					<td><?php echo $server->getData('ip') ?></td>
					<td><?php echo $server->getData('') > 1 ? 'Activated' : 'Deactivated' ?></td>
					<td>
						<a href="?module=<?php echo $_GET['module'] ?>&action=create&id=<?php echo $server->getData('entity_id') ?>">Edit</a>
					</td>
				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
	</div>
<?php
} else {
	?>
	<h3>There is no server yet.</h3>
<?php
}
