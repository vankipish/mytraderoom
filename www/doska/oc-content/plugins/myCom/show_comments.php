<?php if ( !defined('ABS_PATH') ) exit('ABS_PATH is not loaded. Direct access is not allowed.');
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23.06.2016
 * Time: 22:17
 */
$comments = ($myComNI -> allComments(osc_comment_id()));
$jsonComments = json_encode($comments);
$offerId = osc_comment_id();
$jsonMail = json_encode(osc_logged_user_email());
 ?>
<h3 style="margin-left: 5%"> Комментарии к предложению:</h3>
      <input hidden id='answer_for_<?php echo osc_comment_id() ?>' value = '0'>
<div class="comForCom" id="comForCom<?php echo osc_comment_id() ?>">
    <script>js_echo_comments(<?php echo $jsonComments ?>,<?php echo $offerId ?>, <?php echo $jsonMail ?>)</script>

    <?php /*if ($comments !==0)
    {
    foreach ($comments as $comment)
            {
        echo "<ul>
                    <li><a id='author_".$comment['com_id']."'>$comment[author_name]</a>($comment[pub_date]):</li>
                    <li>$comment[com_text]</li>
                    <div>
                  <a id='answer_".$comment['com_id']."' class='myComAnswer' onclick='js_answer($offerId)'>Ответить</a>
                  </div>
                  <div style=\"clear:both;\"></div>
               </ul>
                 ";
            }
    }*/?>
    </div>
  <?php  ?>

