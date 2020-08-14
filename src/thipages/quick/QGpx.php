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
                date("U", strtotime($pt->time))
            ];
            if ($withOriginalTime) $temp[]=$pt->time;
            $res[]=$temp;
        }
        unset($gpx);
        return $res;
    }
}