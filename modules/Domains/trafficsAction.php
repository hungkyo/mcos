<?php
$mode = "Check Traffics";
$domain = $_GET['domain'];
$curl = curl_init("http://{$domain}/visit_log");
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$visit_log = trim(curl_exec($curl));
curl_close($curl);
$visit_log = explode("\n", $visit_log);
$byDate = array();
$today = array();
$ignores = array(
	'bot',
	'BingPreview',
);
foreach ($visit_log AS $log) {
	if (preg_match('/\[(.+)\].*"(.*)"/Uis', $log, $match)) {
		$date = date('d-m-Y', strtotime($match[1]));
		$hour = (string) date('H', strtotime($match[1]));
		$agent = $match[2];
		$isIgnore = false;
		foreach ($ignores AS $ignore) {
			if (stripos($agent, $ignore)) {
				$isIgnore = true;
				break;
			}
		}
		if (!$isIgnore) {
			$byDate[$date]++;
			if ($date == date('d-m-Y')) {
				$today[(string) $hour]++;
			}
		}
	}
}
$byDate = array_reverse($byDate);
$today = array_reverse($today);
?>
<div class="col-md-12">
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo ucwords($mode) ?> Domain</h3>
			<br/>
			<small>System Time: <?php echo date('G:i:s d/m/Y'); ?></small>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<ol><?php
			foreach ($byDate AS $date => $visits) {
				?>
				<li>
					<?php echo $date == date('d-m-Y') ? '<b>' : '' ?>
					<?php echo $date ?>: &nbsp;&nbsp; <?php echo $visits ?>
					<?php echo $date == date('d-m-Y') ? '</b> (Today)' : '' ?>
					<?php
					if ($date == date('d-m-Y')) {
						?>
						<ol>
							<?php
							foreach ($today AS $hourToday => $visitsHour) {
								?>
								<li><?php echo $hourToday ?>: &nbsp;&nbsp; <?php echo $visitsHour ?></li>
							<?php
							}
							?>
						</ol>
					<?php
					}
					?>
				</li>
			<?php
			}
			?></ol>
	</div>
	<!-- /.box -->
</div>