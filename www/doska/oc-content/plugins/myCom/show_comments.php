<?php
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
    $res = $myComNI->dao->get();
        
    while($arr = mysql_fetch_array($res, MYSQL_NUM))
    {
        echo "
    <div class=main>
       <img src=images/comentator.jpg>
            <div class=block_name>
                <span class=name>[2]</span>
                <span class=date>[5]</span>
            </div>
            <div class=coment>
               <div>$arr[4]</div>
            </div>
    </div>
             ";
    }
}