# quickgpx
Quick GPX parser

### Installation
**composer** require thipages\quickgpx

### API
```php
    QGpx::parse($filename,$withOriginalTime=false):array
```
returns an array of array defined as
- latitude
- longitude
- elevation
- UTC unix time
- iso time (if `$withOriginalTime` is set to `true`)

```php
    QGpx::analyze($gpxAsArray):array
```
returns an associated array describing some stats properties
- `timeRange` : [ minUnixTime, maxUnixTime ]
