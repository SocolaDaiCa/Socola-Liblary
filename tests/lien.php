<?php
require_once '../vendor/autoload.php';
use Socola\Facebook;

// $access_token = 'EAAAAUaZA8jlABAHJ8d0u9vhbVV9ImJy3r8YwmcjRbPWZCJqBQGcehK4GpjlMSo5oJkfe8KSTHuCiiaOht71XUGRWqadnOK046U3X8ZAvAvq3aHEJftoB3ZC5zNWwiFtUZC2dKsZB6etB8HzATrHZBrfkpZAN5JnjvsxkDUHvjeawfAZDZD';
// $access_token = 'EAAAAUaZA8jlABAHhNGKpISa53NbDYmru15hxZB7WmMHAgZCNEBvQYmAW4EXoqXjDLHDXrgZBHAZCpnHuEH5V39aXsSAPlL0W3vJ7ob5rqCCr8VX9JiZCoFsw6pnARZAIy4tUqmMWzAd5iGHX90aejNx2dhdzVIYHuUZD';
$access_token = 'EAAAAUaZA8jlABAMzuMWQ4YnZBrmLJ88s17Wpk5QTxUFIEmrZBECVc3Ma0jMZC8APgqfwzXZCcNxV94lZChC9DbZAvl0BHmV4lQkRXZB3ZAfLtTkxtFK1J2elvFKC3KxZCY6cTQ3AGKrG9l96FWbyiwku5mRJsE6I3UVbTE6h7ZAFXPTvgZDZD';
$access_token = 'EAAAAUaZA8jlABAFKu3BBnJ174VcZBvitgdiRsmjAZBgwXvwefZApCvPcWErdrSPjHy8LQ1X2P2EZC8cZC24678IeoVXOyPRJaRhgOvNPBMx1IRmwAZAERLU99lmoXn27dswkdfl8NcsLf2N8NrTwGskupZBZBGB9Bf84ZD';
$fb = new Facebook($access_token);

/* delete*/
//$fb->me()
$me = $fb->me()->excute();
$me = json_decode($me);
$groupIds = $_GET['deletes'] ?? [];
if(!empty($groupIds)){
	foreach ($groupIds as $groupId) {
		file_get_contents("https://graph.facebook.com/{$groupId}/members?member={$me->id}&access_token={$access_token}&method=delete");
		// $fb->group($groupId)->member($me->id)->delete();
	}
	header('Location: lien.php');
	die();
}

/* /delete */

// $access_token = 'EAAAAUaZA8jlABAC0GwrU61eTZC9KvvNJBkLTmNagY1m2o3XBWJxhOV447crxhSiUSd4TRdgxTmcRAxemzJZBU4gZA0ZBwh8fOEwLEussZBZAyefu7CKxj13BFs45XS9nI96ibEhJ64Y5SYN2oGl4kFbDmB3rG7IfuZBkdx7ZAtfJOP2ZCFvMDYC0L9';

$groups = $fb->me()->groups()->limit(1000)->excute();
$groups = json_decode($groups)->data;

// echo "<pre>";
// print_r($groups);
// file_put_contents('groups.json', json_encode($groups, JSON_PRETTY_PRINT));
// $groups = json_decode(file_get_contents('groups.json'));
?>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<div class="container clearfix">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<form action="" method="get" accept-charset="utf-8">
				<h3 class="text-center">Groups of <?=$me->name ?></h3>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Group</th>
							<th style="width: 1px"><button type="submit" class="btn btn-link" style="margin: 0px; padding: 0px"><i class="fa fa-trash fa-lg"></i></button></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($groups as $index => $group): ?>
						<tr>
							<td><?=$index+1; ?></td>
							<td>
								<a href="https://fb.com/groups/<?=$group->id ?>" target="_blank">
									<?=$group->name ?>
								</a>
							</td>
							<td class="text-center">
								<input type="checkbox" value="<?=$group->id ?>" name="deletes[]">
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</form>
		</div>
	</div>