# quickgpx
Quick GPX parser

### Installation
**composer** require thipages\quickgpx

### Usage
```php
    QGpx::parse($filename,$withOriginalTime=false):array
```
returns an array of array defined as
- latitude
- longitude
- elevation
- UTC unix time
- iso time (if `$withOriginalTime` is set to `true`)
