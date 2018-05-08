<?php
/**
 * Created by Lorge 
 *
 * User: Only Love.
 * Date: 12/12/13 - 10:39 AM
 */

class Constants{
    const
        LAYOUT_MAIN = "//layouts/main",
        LAYOUT_ERROR = "//layouts/error",

        STATUS_AVAILABLE = 'available',
        STATUS_UNAVAILABLE = 'unavailable',
        STATUS_SUSPEND = 'suspend',

        NO_IMAGE = 'noImage.jpg'
    ;

    const
        SUCCESS = 'SUCCESS',
        ERROR = 'ERROR';

    const
        OG_TYPE = 'o.g';

    const
        FIRST_ROUND = 8,
        FIRST_ROUND1 = 1,
        FIRST_ROUND2 = 2,
        FIRST_ROUND3 = 3,
        KNOCKOUT = 4,
        QURTER_FINALS = 5,
        SEMIFINALS = 6,
        FINALS = 7;

    const
        SCHEDULE_ALL = 1,
        SCHEDULE_HISTORY = 2,
        SCHEDULE_TODAY = 3,
        SCHEDULE_FEATURE = 4,
        SCHEDULE_COUNTRY = 5,
        SCHEDULE_GROUP = 6;

    const
        STATUS_FEATURE = 1,
        STATUS_NOW = 2,
        STATUS_PAST = 3,
        STATUS_POSTPONE = 4;

    const
        VERSION_MODULE = 'VERSION_MODULE',
        API_MODULE = 'API_MODULE';

    const
        VERSION_KEY = 'VERSION_KEY',
        API_CONTENT = 'API_CONTENT';

    const
        CACHE_TIME = 180;

    const
        CACHE_KEY = "wc_";

    public static function get_curl($url){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_ENCODING, true);
        $result =  curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public static function post_curl($url, $post){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($post));
        curl_exec($ch);
    }

    //http://fruitysolution.vn:8888/wc2014/backend/site/GetMatches
    //http://fruitysolution.vn:8888/wc2014/backend/site/GetTeams
    const
        LINK_JAYADATA = "http://jayadata.co.id/bola/api/send_gcm?";

    const
        LINK_TEAMS = 'http://api.xmlscores.com/standings/?f=json&open=1175becce02379e6750cb59a7ac64e2b&c=wc_2014',
        LINK_MATCHS = 'http://api.xmlscores.com/matches/?f=json&open=1175becce02379e6750cb59a7ac64e2b&c=wc_2014&e=1&l=64&t1=1402542000&t2=1405393200&s=30',

        LINK_MATCHS_TEST = 'http://localhost/wc2014/backend/api/test',
        LINK_MATCHS_TEST_SERVER = 'http://fruitysolution.vn:8888/wc2014/backend/api/test';

    const TIME_ZONE = 'America/Sao_Paulo';

    const EMAIL_ADDRESS = "test@tranquynh.com";
    const EMAIL_PASS = "toiditimtoi123";
    const EMAIL_SERVER = "mail.tranquynh.com";

    const GCM_KEY = "AIzaSyCxwc9QQWp41DP8lGEePRF1l_Bh-9olwyM";
    const GCM_LINK = "https://android.googleapis.com/gcm/send";
}