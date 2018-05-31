<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-03-23 07:57:04
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-03-23 07:57:43
 */
namespace Socola;

class SleepyTime
{
	public static function caculate($timezone)
	{
		date_default_timezone_set('UTC');
		$time = strtotime("{$timezone} hour");
		$now = date("H:i A", $time);
		$time += 15*60; /*15p đánh răng*/
		$date[0] = date("H:i A", $time + 1.5*3600);
		$date[1] = date("H:i A", $time + 3.0*3600);
		$date[2] = date("H:i A", $time + 4.5*3600);
		$date[3] = date("H:i A", $time + 7.5*3600);
		$text = [];
		$text[] = "Bây giờ là {$now}. Nếu {$gender} đi ngủ ngay bây giờ, {$gender} nên cố gắng thức dậy vào một trong những thời điểm sau: \n {$date[0]}, {$date[1]}\n hoặc {$date[2]},\n hoặc {$date[3]},\n (Thức dậy giữa một chu kỳ giấc ngủ khiến {$gender} cảm thấy mệt mỏi, nhưng khi thức dậy vào giữa chu kỳ tỉnh giấc sẽ làm {$gender} cảm thấy tỉnh táo và minh mẫn.)\n";
		$text[] = "Chúc {$gender} ngủ ngon!";
	}
}