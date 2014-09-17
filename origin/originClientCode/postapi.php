<?php
$wp_did_header = true;
include('wp-load.php');
wp();
if($_POST['data']){
	$data = unserialize(gzdecode(base64_decode($_POST['data'])));
}
function insert_post($data)
{
	$title = $data['title'];
	$content = $data['content'];
	$tag = implode(',', $data['tag']);
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

if ($data) {
	foreach ($data AS $_data) {
		$pid = insert_post($_data);
		if ($pid) echo "OK!";
		else echo "KO!";
	}
}
# ok now.. how about the sitemap?
if ($_GET['sitemap'] == 1) {
	$newLink = array(get_option('siteurl'));
	# post
	$q = new WP_Query(array(
		'posts_per_page' => '-1',
		'post_type' => 'post',
	));
	while ($q->have_posts()) {
		$q->the_post();
		$p_name = get_permalink();
		$newLink[] = $p_name;
	}
	$categories = get_categories(array(
		'hide_empty' => 0,
	));
	foreach ($categories AS $cat) {
		$cat_name = get_category_link($cat->term_id);
		$newLink[] = $cat_name;
	}
	$tags = get_tags();
	foreach ($tags AS $tag) {
		$tag_name = get_tag_link($tag->term_id);
		$newLink[] = $tag_name;
	}
	#gen site map
	$noOfSitemaps = 1;
	$maxLinkInOne = 2000;
	$count = 0;
	$temp = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';
	foreach ($newLink AS $c => $link) {
		if ($c == 0) {
			$temp .= '<url>
		<loc>' . $link . '</loc>
		<lastmod>' . date('c') . '</lastmod>
		<changefreq>hourly</changefreq>
		<priority>1.0</priority>
	</url>
';
		} else {
			$temp .= '<url>
		<loc>' . $link . '</loc>
		<lastmod>' . date('c') . '</lastmod>
		<changefreq>daily</changefreq>
		<priority>0.8</priority>
	</url>
';
		}
		$count++;
		if ($count == $maxLinkInOne) {
			$temp .= '</urlset>';
			file_put_contents('sitemap-' . $noOfSitemaps . '.xml', $temp);
			$temp = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';
			$count = 0;
			$noOfSitemaps++;
		}
	}
	if ($count <> 0) {
		$temp .= '</urlset>';
		file_put_contents('sitemap-' . $noOfSitemaps . '.xml', $temp);
	}
	$temp = '<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.google.com/schemas/sitemap/0.84">
';
	for ($i = 1; $i <= $noOfSitemaps; $i++) {
		$temp .= '<sitemap>
	<loc>' . get_option('siteurl') . '/sitemap-' . $i . '.xml</loc>
	<lastmod>' . date('c') . '</lastmod>
</sitemap>
';
	}
	$temp .= '</sitemapindex>';
	file_put_contents('sitemap.xml', $temp);
	$ch = curl_init('http://www.bing.com/ping?sitemap=' . urlencode(get_bloginfo('siteurl').'/sitemap.xml'));
	curl_setopt($ch, CURLOPT_HEADER, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	$head = curl_exec($ch);
	curl_close($ch);
}

if ($_POST['pingnow'] == 1) {
	$ch = curl_init('http://matrixcyber.com/mcos/pinglist.txt');
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$services = curl_exec($ch);
	curl_close($ch);
	$services = explode("\n", $services);
	foreach ((array)$services as $service) {
		$service = trim($service);
		if ('' != $service)
			weblog_ping($service);
	}
	$ch = curl_init('http://www.bing.com/ping?sitemap=' . urlencode(get_bloginfo('rss2_url')));
	curl_setopt($ch, CURLOPT_HEADER, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	$head = curl_exec($ch);
	curl_close($ch);
}