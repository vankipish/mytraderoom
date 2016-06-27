<?php if ( !defined('ABS_PATH') ) exit('ABS_PATH is not loaded. Direct access is not allowed.');
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23.06.2016
 * Time: 22:17
 */
?>

<div>Комментарии к предложению:</div>
<?php
    $comments = ($myComNI -> allComments(osc_comment_id()));
    var_dump($comments);
 foreach ($comments as $comment) {
        echo "<br>
        <div style='margin-left: 5%' class=myCom_main>
           
                <div class=block_name>
                    <span class=name>От:$comment[author_name]</span>
                    <span class=date>Опубликовано:$comment[pub_date]</span>
                </div>
                <div class=comment>
                   <div>$comment[com_text]</div>
                </div>
        </div>
                 ";
    }?>
