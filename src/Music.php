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
// | Date : 2019/6/8 11:10
// +----------------------------------------------------------------------

namespace KGMusic;


use KGMusic\Data\MusicData;
use KGMusic\Utility\ParserUtility;
use KGMusic\Utility\StringUtility;
use KGMusic\Utility\CurlUtility;

class Music
{
    public $data;

    function __construct(MusicData $data)
    {
        $this->data = $data;
    }

    function search()
    {

        $url = str_replace(
            [
                '__KEYWORD__',
                '__PAGE__',
                '__LIMIT__'
            ],
            [
                urlencode($this->data->keywords),
                $this->data->page,
                $this->data->limit
            ],
            ParserUtility::KEYWORDS_SEARCH_URL
        );
        $body = CurlUtility::get($url);
        $content = '';
        if (!empty($body)) {
            $content = ltrim($body, 'kgJSONP020492974(');
            $content = rtrim($content, ')');
            $content = json_decode($content, true);
        }

        return $content;
    }

    function details()
    {

        $rand_1 = StringUtility::round(10);
        $rand_2 = StringUtility::round(10);
        $time = time();
        $time_1 = time() * 3;
        $url = str_replace(
            [
                '__TIME_1__',
                '__TIME__',
                '__HASH__',
                '__ALBUM_ID__',
                '__RAND_1__',
                '__RAND_2__',
            ],
            [
                $time_1,
                $time,
                $this->data->hash,
                $this->data->album_id,
                $rand_1,
                $rand_2
            ],
            ParserUtility::DETAILS_URL
        );
        $body = CurlUtility::get($url);
        $data = [];
        if (!empty($body)) {
            $content = ltrim($body, 'jQuery' . $time_1 . '_' . $time . '(');
            $content = rtrim($content, ');');
            $data = json_decode($content, true);
        }
        return $data;
    }
}