<?php if ( !defined('ABS_PATH') ) exit('ABS_PATH is not loaded. Direct access is not allowed.');
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23.06.2016
 * Time: 22:17
 */
$comments = ($myComNI -> allComments(osc_comment_id()));
$offerId = osc_comment_id();
if ($comments !==0)
  { ?>

<h3 style="margin-left: 5%"> Комментарии к предложению:</h3>
<div class="comForCom" id="comForCom<?php echo osc_comment_id() ?>">
    <?php
    //var_dump($comments);
    foreach ($comments as $comment) {
        echo "<ul>
                    <li>$comment[author_name] ($comment[pub_date]):</li>
                    <li>$comment[com_text]</li>
               </ul>  
                  <div>
                  <a class='myComAnswer' onclick='js_answer($offerId,$comment)'>Ответить</a>
                  </div>
                  <div style=\"clear:both;\"></div>
                 ";
    }?>
    </div>
  <?php } ?>

