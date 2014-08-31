<?php
$wp_did_header = true;
include( 'wp-load.php' );
wp();
$data = unserialize(gzdecode(base64_decode($_POST['data'])));
function insert_post($data)
{
	$title = $data['title'];
	$content = $data['content'];
	$tag = implode(',',$data['tag']);
	$cat = $data['cat'];
	$catArray = array();
	foreach ($cat AS $c) {
		$cid = get_cat_ID($c);
		if (!$cid) {
			$cid = wp_insert_term($c, 'category');
			if (is_object($cid)) $cid = $cid->error_data['term_exists'];
			elseif ($cid['term_id']) $cid = $cid['term_id'];
		}
		if ($cid) $catArray[] = $cid;
	}
	$post_id = wp_insert_post(array(
		'post_title' => $title,
		'post_content' => $content,
		'post_author' => 1,
		'tags_input' => $tag,
		'post_category' => $catArray,
		'post_status' => 'publish',
	));
	if ($post_id) return $post_id;
	else return false;
}
foreach ($data AS $_data){
	$pid = insert_post($_data);
	if ($pid) echo "OK!";
	else echo "KO!";
}
if ($_POST['pingnow'] == 1) {
	$services = get_option('ping_sites');
	$services = explode("\n", $services);
	foreach ((array)$services as $service) {
		$service = trim($service);
		if ('' != $service)
			weblog_ping($service);
	}
}
