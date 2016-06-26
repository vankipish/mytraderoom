<?php if ( !defined('ABS_PATH') ) exit('ABS_PATH is not loaded. Direct access is not allowed.');

/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 24.06.2016
 * Time: 9:50
 */
$path = dirname(dirname(dirname(__DIR__)));
?>

<div class="myCom_form">
    <form name="myCom_form" id="myCom_form">
        <fieldset>
<div class="myCom_title">
     <span>
         <h2>Обсуждение предложения:</h2>
              <a href="<?php echo osc_item_url() ?>">
                  <?php echo osc_item_title() ?>
</a>
                               </span>
</div>
<div class="top">
    <img id="addcomentbutton"  onClick="toggle('addcoment'); location.href='#coments';" src="./oc-content/plugins/myCom/images/comment.png"/>
</div>
<div id="addcoment" class="addcoment" style="display:none;">

    <input hidden id="item_id" value="<?php echo osc_item_id(); ?>">
    <input hidden id="parent_com_id" value="<?php echo osc_comment_id(); ?>">
    <input hidden id="myCom_time" value="<?php echo time(); ?>">

    <div id="statusbox">Комментарий должен быть по теме и составлен корректно!</div>
<input id="myCom_name" type="text" name="myCom_name" value="<?php if (osc_user_name() !== "") {echo osc_user_name();} else {echo "Имя (Обязательно)";} ?>" maxlength="60" onfocus="clearText(this)" onblur="clearText(this)"/>
<input id="myCom_email" type="text" name="myCom_email" value="<?php if (osc_user_email() !== "") {echo osc_user_email();} else {echo "Почта (Обязательно, не публикуется)";} ?>" maxlength="60" onfocus="clearText(this)" onblur="clearText(this)"/>
<textarea id="myCom_text" name="myCom_text" onfocus="clearText(this)" onblur="clearText(this)"></textarea>
        <span>
        <input id="nr" onClick="document.getElementById('nr').value='nerobot';" type="checkbox" name="nr"/>
        <b>я не робот...</b>
        </span>
            <button id="button" type="submit" class="btn btn-success">
                Оставить коммент
            </button>
        </fieldset>
</form>
</div>
<?php
include_once "$path/oc-content/plugins/myCom/show_comments.php";
show_comments(osc_item_id());
?>
       