<?php
namespace thipages\quick;
class QGpx {
    public static function parse($filePath,$withOriginalTime=false) {
        date_default_timezone_set("UTC");
        $gpx = simplexml_load_file($filePath);
        $res = [];
        foreach ($gpx->trk->trkseg->trkpt as $pt) {
            $temp = [
                (float)$pt['lat'],
                (float)$pt['lon'],
                (float)$pt->ele,
                date("U", (string)strtotime($pt->time))
            ];
            if ($withOriginalTime) $temp[]=(string)$pt->time[0];
            $res[]=$temp;
        }
        unset($gpx);
        return $res;
    }
    public static function analyze($gpxAsArray) {
        $props=[PHP_INT_MAX,PHP_INT_MIN];
        foreach ($gpxAsArray as $gpxEle) {
            if ($gpxEle[3]<$props[0]) $props[0]=$gpxEle[3];
            if ($gpxEle[3]>$props[1]) $props[1]=$gpxEle[3];
        }
        return [
            'timeRange'=>[$props[0],$props[1]]
        ];
    }
}