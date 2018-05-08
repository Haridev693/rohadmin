<?php
/**
 * Created by PhpStorm.
 * User: Yoona
 * Date: 15/08/2014
 * Time: 22:02
 */
class ApiController extends Controller
{
    public function filters()
    {
        return array();
    }
    public function actions() {
        return array(
            'login'=>'application.controllers.api.SearchLoginAction',
            'tables'=>'application.controllers.api.ShowTablesAction',
            'category'=>'application.controllers.api.ShowCategoryAction',
            'product'=>'application.controllers.api.SearchProductAction',
            'upstatus'=>'application.controllers.api.UpdateStatusAction',
            'addCart'=>'application.controllers.api.AddCartAction',
            'addBooking'=>'application.controllers.api.AddBookingAction',
            'showcart'=>'application.controllers.api.ShowCartAction',
            'addHistory'=>'application.controllers.api.AddHistoryAction',
            'custDetails'=>'application.controllers.api.CustDetailsAction'

        );
    }

    public static function getStatusCodeMessage($status) {
        $codes = array(
            200 => 'OK',
            400 => 'ERROR: Bad request. API does not exist OR request failed due to some reason.',
        );

        return (isset($codes[$status])) ? $codes[$status] : null;
    }
    public static function sendResponse($status = 200, $body = '', $content_type = 'application/json') {
        header('HTTP/1.1 ' . $status . ' ' . self::getStatusCodeMessage($status));
        header('Content-type: ' . $content_type);
        if(trim($body) != '') echo $body;

        Yii::app()->end();
    }
}