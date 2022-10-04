<?php

use Carbon\Carbon;

function aff($var, $txt = null)
{
	echo '<a title=' . debug_backtrace()[0]['file'] . '&nbsp;-&nbsp;Line&nbsp;' . debug_backtrace()[0]['line'] . '><pre>' . (($txt) ? $txt . ' : ' : '');
	var_dump($var);
	echo '</pre></a>';
}
// aff(debug_backtrace());

function getDt($v = 'm')
{
	$_SESSION[$v]['dt'] = $_SESSION[$v]['dt'] ?? null ?: serialize((new Carbon())->locale('fr'));

	return unserialize($_SESSION[$v]['dt']);
}

/**
 * Get Array L → D.
 */
function getColumnHeads(): array
{
	$dt = Carbon::create('2022-03-20');
	for ($i = 0; $i++ < 7;) {
		$daysNames[] = $dt->addDay()->locale('fr')->dayName;
	}

	return $daysNames;
}

function getCalendarsVars($dt, $v)
{
	global $data;
	$data[$v]['d']      = $dt[$v]->day;
	$data[$v]['m']      = $dt[$v]->month;
	$data[$v]['moisFr'] = $dt[$v]->locale('fr')->monthName;
	$data[$v]['y']      = $dt[$v]->year;

	$day0                = $dt[$v]->copy()->firstOfMonth()->dayOfWeekIso;
	$days                = $dt[$v]->daysInMonth;
	$daysInPreviousMonth = $dt[$v]->copy()->subMonth()->daysInMonth;

	$data['currentMonth'] = (new Carbon())->month;

	$month = [];
	for ($i = $daysInPreviousMonth - $day0 + 1; $i++ < $daysInPreviousMonth;) {
		$month[] = $i * -1;
	}
	$month = array_merge($month, range(1, $days));
	$month = array_merge($month, array_map(function ($v) {
		return $v * -1;
	}, range(1, 42 - count($month))));

	return $month;
}