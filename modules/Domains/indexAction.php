<?php
$domains = getModel("domain")
	->getAll()
	->addOrder('installed', 'DESC')
	->addOrder('visits', 'DESC')
	->addOrder('entity_id', 'DESC')
	->load();
if (count($domains)) {
	?>
	<div class="box-body table-responsive">
		<table id="example2" class="table table-bordered table-hover">
			<thead>
			<tr>
				<th>ID</th>
				<th>Domain</th>
				<th>IP</th>
				<th>Installed</th>
				<th>Active?</th>
				<th>No. of Posts</th>
				<th>Life Time Traffics</th>
				<th>Edit</th>
			</tr>
			</thead>
			<tbody>


			<?php
			foreach ($domains AS $domain) {
				?>
				<tr>

					<td><?php echo $domain->getId() ?></td>
					<td><?php echo $domain->getData('name') ?></td>
					<td><?php echo getModel("server")->load($domain->getData('server'))->getData('ip') ?></td>
					<td><?php echo $domain->getData('installed') > 0 ? 'Installed' : 'Not Installed' ?></td>
					<td><?php echo $domain->getData('active') > 0 ? 'Activated' : 'Not Activated' ?></td>
					<td><?php echo $domain->getData('posts') ?></td>
					<td><?php
						echo (int) $domain->getData('visits');
						$curl = curl_init("http://{$domain->getData('name')}/visit_log");
						curl_setopt($curl, CURLOPT_HEADER, false);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
						$visit_log = trim(curl_exec($curl));
						curl_close($curl);
						$visit_log = explode("\n",$visit_log);
						$newVisitsCount = count($visit_log);
						if($newVisitsCount <> (int) $domain->getData('visits')){
							$domain->setData('visits',$newVisitsCount)->save();
							echo ' => '.$newVisitsCount;
						}
						?></td>
					<td>
						<a href="?module=<?php echo $_GET['module'] ?>&action=create&id=<?php echo $domain->getData('entity_id') ?>">Edit</a>
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
	<h3>There is no Domain yet.</h3>
<?php
}
