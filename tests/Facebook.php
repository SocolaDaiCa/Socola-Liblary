<?php
	require_once '../vendor/autoload.php';
	use Socola\Facebook;
	use Socola\Facebook\Graph;
	$access_token = '';
//	$access_token = 'EAACW5Fg5N2IBAFXs5ZCk2hZCvIXHt7TRZA1gZBot0C6qom2asrP7mGN2k4wHaTA0ZABqkKV8tX3xRhbocVsuTi5pHWtwOhUZBCyLXAukP7RGfTr0CTdJTrBhZBs9BV9qn858Qhu1XB1ASzj1e68LF83ZBZCda2z6vJedDbihJKpRuS75r9Y10vRLLjcDV0BFnKZA8ZD';
	$fb = new Facebook($access_token);
	$fbs = [
		$fb->me(),
		$fb->me(),
		$fb->me()->groups(),
		$fb->me()->friends(),
		$fb->group('1234')->members()
	];
//	$fbs = [
//		'version'            => $fb->v('2.3'),
//		'me'                 => $fb->me(),
//		'me has friends'     => $fb->me()->friends(),
//		'me add friend'      => $fb->me()->friends()->add(['uid' => '12345']),
//		'me has groups'      => $fb->me()->groups(),
//		'group'              => $fb->group('12345'),
//		'group has members'  => $fb->group('123345')->members(),
//		'delete member in group' => $fb->group('12345')->member('12345')->delete(),
//		'post'               => $fb->post('12345'),
//		'post has reactions' => $fb->post('12345')->reactions(),
//		'post has comments'  => $fb->post('12345')->comments(),
//		'comment'            => $fb->comment('12345'),
//		'reaction post'      => $fb->post('12345')->reactions()->
//
//		// $fb->v('2.3')->group('364997627165697')
//	];
	foreach ($fbs as $index => $fb) {
		$fbs[$index] = $fb->toQuery();
	}
	// foreach ($fbs as $fb) {
	//  echo $fb->toQuery() . '<br>';
	// }
	// $fb->
	// $res = Facebook::getToken('tokentien@gmail.com', 'ía8eu128u91');
	// print_r($res);
	// // $fb = new Facebook('');
	// // $infos = [
	// //   'xghenwl_fergieescu_1521967280@tfbnw.net|usos2xe1egg',
	// // ];
	// // foreach ($infos as $key => $info) {
	// //   [$email, $password] = explode('|', $info);
	// //   $accessToken = Facebook::getToken($email, $password, 'android')->access_token;
	// //   print_r($accessToken);
	// //   echo('<br>');
	// // }
	// // $fb = new Facebook('EAAAAUaZA8jlABANnxrUrBAciaJPpg9ZCTiyyLoUw3ZCB0XLm6MBZB7kgWEzGFEH46AD5WEYMZAe6TeCyldNskcQdROBZAOrg5o7x2vkBUriZAt2USDhVbSfJZBZCfnVhaEXU6Nym3ArYAd76PorJNQg1hcze2kjOi80N3QUKVffii3IkOIfn2NcYQzvXM62DDAsAZD');
	// // $res = $fb->reaction('100004399725901_968352189988096', 'LIKE');
	// // echo '<pre>';
	// // print_r($res);
	// // // $res = $fb->graph('364997627165697', [
	// // //    'fields' => 'members.limits(1000)'
	// // // ]);
	// // // print_r($res);
?>
<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<table class="table table-bordered table-hover table-responsive">
	<thead>
		<tr>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($fbs as $key => $value): ?>
			<tr>
				<td><?=$key ?></td>
				<td><?=$value ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>