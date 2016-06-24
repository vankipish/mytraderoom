<?php if ( !defined('ABS_PATH') ) exit('ABS_PATH is not loaded. Direct access is not allowed.');
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23.06.2016
 * Time: 22:17
 */
$path = dirname(dirname(dirname(__DIR__)));
include_once "$path/oc-includes/osclass/model/myCom.php";
$myComNI = myCom::newInstance();

function show_comments($id_article)//выводвсехкомментариевкстатье
{
    $myComNI = myCom::newInstance();
    $myComNI ->dao->select('*');
    $myComNI->dao->from('oc_t_comment_comment');
    $conditions = array('item_id'  => $id_article,
                        'b_enabled'    => 1);
    $myComNI->dao->where($conditions);
    $myComNI->dao->orderBy('pub_date');
    $result = $myComNI->dao->get();
    $res = $result->result();
    foreach ($res as $comment)
    {
        echo "<br>
    <div class=main>
       
            <div class=block_name>
                <span class=name>$comment[author_name]</span>
                <span class=date>$comment[pub_date]</span>
            </div>
            <div class=comment>
               <div>$comment[com_text]</div>
            </div>
    </div>
             ";
    }
}