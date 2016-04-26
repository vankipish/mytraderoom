<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23.04.2016
 * Time: 11:39
 */
if(isset($_POST['score'])) {
    header("Content-type: text/txt; charset=UTF-8");
    if($_POST['score']>'0') {
        echo "score =".$_POST['score'];
        echo "исполнитель =".$_POST['executor'];
        echo "оценку поставил =".$_POST['r_of_user'];
        echo $_POST['r_pub_date']." числа";
    }
    else {
        echo 'карявый POST запрос';
    }
}
;$path = $_SERVER['DOCUMENT_ROOT'] . '/doska';
include_once "$path./oc-includes/osclass/model/userRaty.php";
include_once "$path./oc-includes/osclass/classes/database/DAO.php";

        $executor = $_POST['executor'];
        $rating = $_POST['score'];
        //$userName = Session::newInstance()->_get('userName');
        $userId = $_POST['r_of_user'];
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
?>

        
    
