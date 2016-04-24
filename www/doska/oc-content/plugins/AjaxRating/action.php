<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23.04.2016
 * Time: 11:39
 */
Class RatyAction
{
    private $manager = null;
    var $is_admin;
    var $data;

    function __construct($is_admin = false)
    {
        $this->is_admin = $is_admin;
        $this->manager = Item::newInstance();
    }

    public function add()
    {
        $executor = osc_user_id();
        $rating = Params::getParam('score');
        //$userName = Session::newInstance()->_get('userName');
        $userId = Session::newInstance()->_get('userId');
        $mRaty = userRaty::newInstance();

        $aRaty = array(
            'r_pub_date' => date('Y-m-d H:i:s')
            //,'r_id'           => $ratyId
        , 'r_executor' => $executor
        , 'r_rating' => $rating
            //,'r_comment'      => $rComment
        , 'r_of_user' => $userId);

        if ($mRaty->insert($aRaty)) {
            $ratyID = $mRaty->dao->insertedId();
        }

        return 0;
    }
}