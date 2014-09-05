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
$ignores = array(
	'bot',
	'BingPreview',
);
foreach ($visit_log AS $log) {
	if (preg_match('/\[(.+)\].*"(.*)"/Uis', $log, $match)) {
		$date = date('d-m-Y', strtotime($match[1]));
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
		}
	}
}
$byDate = array_reverse($byDate);
?>
<div class="col-md-12">
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title"><?php echo ucwords($mode) ?> Domain</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<ol><?php
			foreach ($byDate AS $date => $visits) {
				?>
				<li><?php echo $date ?>. &nbsp;&nbsp; <?php echo $visits ?></li>
			<?php
			}
			?></ol>
	</div>
	<!-- /.box -->
</div>