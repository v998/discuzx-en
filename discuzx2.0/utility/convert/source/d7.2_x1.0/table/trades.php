<?php

/**
 * DiscuzX Convert
 *
 * $Id: trades.php 10469 2010-05-11 09:12:14Z monkey $
 * English by Valery Votintsev at sources.ru
 */

$curprg = basename(__FILE__);

$table_source = $db_source->tablepre.'trades';
$table_target = $db_target->tablepre.'forum_trade';

$limit = 2000;
$nextid = 0;

$start = getgpc('start');
if($start == 0) {
	$start = 0;
	$db_target->query("TRUNCATE $table_target");
}

$query = $db_source->query("SELECT * FROM $table_source LIMIT $start, $limit");
while ($data = $db_source->fetch_array($query)) {

	$nextid = 1;

	$data  = daddslashes($data, 1);

	$datalist = implode_field_value($data, ',', db_table_fields($db_target, $table_target));

	$db_target->query("INSERT INTO $table_target SET $datalist");
}

if($nextid) {
	showmessage(lang('continue_convert_table').$table_source.lang('from'). $start .lang('to'). ($start+$limit). lang('lines'), "index.php?a=$action&source=$source&prg=$curprg&start=".($start+$limit));
}

?>