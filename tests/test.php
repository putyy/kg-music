<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.
// +----------------------------------------------------------------------
// | user : LW放下
// +----------------------------------------------------------------------
// | blog : www.putyy.com
// +----------------------------------------------------------------------
// | email: 10945014@qq.com
// +----------------------------------------------------------------------
// | Date : 2019/6/8 12:36
// +----------------------------------------------------------------------
use KGMusic\Music;
use KGMusic\Data\MusicData;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $musicData = new MusicData;
    $musicData->keywords = '当年情';
    $searchObj = new Music($musicData);
    $data = $searchObj->search();
    var_dump($data);

    $musicData->hash = '9d7cb369e1d9388e976c3441fa7d36aa';
    $musicData->album_id = '1779085';
    $detailsObj = new Music($musicData);
    $details = $detailsObj->details();
    var_dump($details);
} catch (\Exception $exception) {
    echo 'error:' . $exception->getMessage();
    return;
}
echo 'ok';
