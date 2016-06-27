<?php if ( !defined('ABS_PATH') ) exit('ABS_PATH is not loaded. Direct access is not allowed.');

/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 24.06.2016
 * Time: 9:50
 */
$path = dirname(dirname(dirname(__DIR__)));
include_once "$path./oc-includes/osclass/model/myCom.php";
$myComNI = myCom::newInstance();
?>

<?php MyComForm::js_validation(); ?>
<div class="myCom_form">

    <?php // include_once "$path/oc-content/plugins/myCom/show_comments.php";?>

<div class="top">
    <img id="addcomentbutton"  onClick="toggle('addcoment'); location.href='#coments';" src="./oc-content/plugins/myCom/images/comment.png"/>
</div>
    <div id="addcoment" class="addcoment" >
            <form name="myCom_form" id="myCom_form">
                <fieldset>

            <input hidden id="item_id" value="<?php echo osc_item_id(); ?>">
            <input hidden id="parent_com_id" value="<?php echo osc_comment_id(); ?>">
            <input hidden id="myCom_time" value="<?php echo time(); ?>">

                    <?php include_once "$path/oc-content/plugins/myCom/show_comments.php"; ?>

        <input id="myCom_name" type="text" name="myCom_name" value="<?php if (osc_logged_user_name() !== "") {echo osc_user_name();} else {echo "Имя (Обязательно)";} ?>" maxlength="60" onfocus="clearText(this)" onblur="clearText(this)"/>
        <input id="myCom_email" type="text" name="myCom_email" value="<?php if (osc_logged_user_email() !== "") {echo osc_user_email();} else {echo "Почта (Обязательно, не публикуется)";} ?>" maxlength="60" onfocus="clearText(this)" onblur="clearText(this)"/>
        <textarea id="myCom_text" name="myCom_text" onfocus="clearText(this)" onblur="clearText(this)"></textarea>

                    <div style="margin-bottom: 20px">
                        <button id="button" type="submit" class="btn btn-success">
                            Оставить коммент
                        </button>
                    </div>
                    <div style="margin-top: 15px"  class="errorMyCom"></div>
                </fieldset>
            </form>
    </div>
</div>


       