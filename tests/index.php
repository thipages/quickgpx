<?php
include('../src/thipages/quick/QGpx.php');
use thipages\quick\QGpx;

$res=[
    'trk.gpx'=> [
        [
            [44.97067333, 4.80414167, 537, 1596774224, "2020-08-07T04:23:44.729Z"],
            [44.97067333,4.80414167,537,1596774225,"2020-08-07T04:23:45.729Z"]
        ],[
            'timeRange'=>[1596774224, 1596774225]
        ]
    ]
];
$validation=[];
foreach ($res as $file=>$excepted) {
    $gpx=QGpx::parse($file,true);
    $stats=QGpx::analyze($gpx);
    $valid=true;
    for ($i=0;$i<count($gpx);$i++) {
        $valid=array_diff($gpx[$i],$res[$file][0][$i])==null;
        if (!$valid) break;
    }
    $valid=array_diff($stats['timeRange'],$res[$file][1]['timeRange'])==null;
    $validation[$file]=$valid?"ok":"nok";
}

print_r($validation);