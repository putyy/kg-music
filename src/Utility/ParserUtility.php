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
// | Date : 2019/6/8 11:17
// +----------------------------------------------------------------------

namespace KGMusic\Utility;


class ParserUtility
{
    const KEYWORDS_SEARCH_URL = 'http://mobilecdn.kugou.com/api/v3/search/song?format=jsonp&keyword=__KEYWORD__&page=__PAGE__&pagesize=__LIMIT__&showtype=1&callback=kgJSONP020492974';
    const DETAILS_URL = 'https://wwwapi.kugou.com/yy/index.php?r=play/getdata&callback=jQuery__TIME_1_____TIME__&hash=__HASH__&album_id=__ALBUM_ID__&dfid=__RAND_1__&mid=__RAND_2__&platid=4&_=__TIME__';
}