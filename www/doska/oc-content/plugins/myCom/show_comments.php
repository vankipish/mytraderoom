<?php if ( !defined('ABS_PATH') ) exit('ABS_PATH is not loaded. Direct access is not allowed.');
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23.06.2016
 * Time: 22:17
 */
?>

<div id="result">Комментарии к предложению:
<?php
    $comments = ($myComNI -> allComments(osc_comment_id()));
    //var_dump($comments);
 if ($comments !== 0)
 {
     foreach ($comments as $comment) {
         echo "<ul>
                    <li>От:$comment[author_name]</li>
                    <li>Опубликовано:$comment[pub_date]</li>
                    <li>$comment[com_text]</li>
                 ";
     }
 }
?>
</div>
