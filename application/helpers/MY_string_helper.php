<?php
function getRomanNumerals($decimalInteger) {
	$n = intval($decimalInteger);
	$res = '';

	$roman_numerals = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);

	foreach ($roman_numerals as $roman => $numeral) {
		$matches = intval($n / $numeral);
		$res .= str_repeat($roman, $matches);
		$n = $n % $numeral;
	}

	return $res;
}

function getFullname($firstname, $midname, $lastname) {
	$fullname = $firstname . ' ' . ($midname == '' ? '' : $midname . ' ') . $lastname;
	return $fullname;
}

//set local DateTime
function setLocalDateTime($datetime, $format = "Y-m-d H:i:s") {
	$datetime = new DateTime($datetime, new DateTimeZone('UTC'));
	$datetime->setTimezone(new DateTimeZone('Asia/Calcutta'));
	$date = $datetime->format($format);
	
	return $date;
}
	
function getDateFormat($date, $format = 'd-M-Y') {
	$myDateTime = new DateTime($date);
	$my_date_format = date($format, $myDateTime -> format('U'));
	return $my_date_format;
}

function convertToMySqlDate($date, $fromFormat = 'd-m-Y', $toFormat = 'Y-m-d') {
	$dt = new DateTime();
	$datetime = $dt -> createFromFormat($fromFormat, $date) -> format($toFormat);
	return $datetime;
}

function getRelativeTime($timestamp) {
	// Get time difference and setup arrays
	$difference = time() - $timestamp;
	$periods = array("second", "minute", "hour", "day", "week", "month", "years");
	$lengths = array("60", "60", "24", "7", "4.35", "12");

	// Past or present
	if ($difference >= 0) {
		$ending = "ago";
	} else {
		$difference = -$difference;
		$ending = "to go";
	}

	// Figure out difference by looping while less than array length
	// and difference is larger than lengths.
	$arr_len = count($lengths);
	for ($j = 0; $j < $arr_len && $difference >= $lengths[$j]; $j++) {
		$difference /= $lengths[$j];
	}

	// Round up
	$difference = round($difference);

	// Make plural if needed
	if ($difference != 1) {
		$periods[$j] .= "s";
	}

	// Default format
	$text = "$difference $periods[$j] $ending";

	// over 24 hours
	if ($j > 2) {
		// future date over a day formate with year
		if ($ending == "to go") {
			if ($j == 3 && $difference == 1) {
				$text = "Tomorrow at " . date("g:i a", $timestamp);
			} else {
				$text = date("F j, Y \a\\t g:i a", $timestamp);
			}
			return $text;
		}

		if ($j == 3 && $difference == 1) {// Yesterday
			$text = "Yesterday at " . date("g:i a", $timestamp);
		} else if ($j == 3) {// Less than a week display -- Monday at 5:28pm
			$text = date("l \a\\t g:i a", $timestamp);
		} else if ($j < 6 && !($j == 5 && $difference == 12)) {// Less than a year display -- June 25 at 5:23am
			$text = date("F j \a\\t g:i a", $timestamp);
		} else {// if over a year or the same month one year ago -- June 30, 2010 at 5:34pm
			$text = date("F j, Y \a\\t g:i a", $timestamp);
		}
	}

	return $text;
}

function dateDiff($dateStart, $dateEnd) {
	$start = strtotime($dateStart);
	$end = strtotime($dateEnd);
	$days = ($end - $start) + 1;
	$days = ceil($days / 86400);
	return $days;
}

function firstNwords($text, $length = 200, $dots = true) {
	$text = trim(preg_replace('#[\s\n\r\t]{2,}#', ' ', $text));
	$text_temp = $text;
	while (substr($text, $length, 1) != " ") { $length++;
		if ($length > strlen($text)) {
			break;
		}
	}
	$text = substr($text, 0, $length);
	return $text . (($dots == true && $text != '' && strlen($text_temp) > $length) ? ' ...' : '');
}

function getFormatedAmount($val) {
	return number_format($val, 2, '.', ',');
}

function getAmtInWords($no) {
	$words = array('0' => '', '1' => 'One', '2' => 'Two', '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six', '7' => 'Seven', '8' => 'Eight', '9' => 'Nine', '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve', '13' => 'Thirteen', '14' => 'Fouteen', '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen', '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty', '30' => 'Thirty', '40' => 'Fourty', '50' => 'Fifty', '60' => 'Sixty', '70' => 'Seventy', '80' => 'Eighty', '90' => 'Ninty', '100' => 'Hundred', '1000' => 'Thousand', '100000' => 'Lakh', '10000000' => 'Crore');
	if ($no == 0)
		return ' ';
	else {
		$novalue = '';
		$highno = $no;
		$remainno = 0;
		$value = 100;
		$value1 = 1000;
		while ($no >= 100) {
			if (($value <= $no) && ($no < $value1)) {
				$novalue = $words["$value"];
				$highno = (int)($no / $value);
				$remainno = $no % $value;
				break;
			}
			$value = $value1;
			$value1 = $value * 100;
		}
		if (array_key_exists("$highno", $words))
			return $words["$highno"] . " " . $novalue . " " . getAmtInWords($remainno);
		else {
			$unit = $highno % 10;
			$ten = (int)($highno / 10) * 10;
			return $words["$ten"] . " " . $words["$unit"] . " " . $novalue . " " . getAmtInWords($remainno);
		}
	}
}

function getActiveStatus($val) {
	if($val == 1) {
		return "Yes";
	}else {
		return "No";
	}
}



?>