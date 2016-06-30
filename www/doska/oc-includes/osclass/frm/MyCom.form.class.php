<?php if ( ! defined('ABS_PATH')) exit('ABS_PATH is not loaded. Direct access is not allowed.');

/*
 * Copyright 2014 Osclass
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

class MyComForm extends Form
{

    static public function js_validation($id)
    {
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                // Code for form validation
                $("#myCom_form<?php echo $id?>").validate({
                    rules: {
                        myCom_name: {
                            required: true,
                            minlength: 1,
                            maxlength: 30
                        },
                        myCom_email: {
                            required: true,
                            minlength: 3,
                            maxlength: 30
                        },
                        myCom_text: {
                            required: true,
                            minlength: 3,
                            maxlength: 500
                        }
                    },
                    messages: {
                        myCom_name: {
                            required: "Введите имя!",
                            minlength: "Имя слишком короткое",
                            maxlength: "Воу воу, краткость - сестра таланта"
                        },
                        myCom_email: {
                            required: "Введите email!",
                            minlength: "Это не email",
                            maxlength: "Воу воу, краткость - сестра таланта"
                        },
                        myCom_text: {
                            required: "Введите комментарий!",
                            minlength: "Комментарий слишком короткий",
                            maxlength: "Воу воу, краткость - сестра таланта"
                        }
                    },
                    errorElement : 'div',
                    errorLabelContainer: '#errorMyCom<?php echo $id?>',


                    submitHandler: function(form) {

                        var $myCom_name<?php echo $id?> = document.getElementById('myCom_name<?php echo $id?>').value;
                        var $item_id<?php echo $id?> = document.getElementById('item_id<?php echo $id?>').value;
                        var $parent_com_id<?php echo $id?> = document.getElementById('parent_com_id<?php echo $id?>').value;
                        var $myCom_email<?php echo $id?> = document.getElementById('myCom_email<?php echo $id?>').value;
                        var $myCom_time<?php echo $id?> = document.getElementById('myCom_time<?php echo $id?>').value;
                        var $myCom_text<?php echo $id?> = document.getElementById('myCom_text<?php echo $id?>').value;
                        var $answer_for_<?php echo $id?> = document.getElementById('answer_for_<?php echo $id?>').value;

                        $.ajax
                        ({
                            type: "POST",
                            url: '<?php echo osc_base_url(true); ?>?page=ajax&action=myCom',
                            data: {
                                "myCom_name": $myCom_name<?php echo $id?>,
                                "item_id": $item_id<?php echo $id?>,
                                "parent_com_id": $parent_com_id<?php echo $id?>,
                                "myCom_email": $myCom_email<?php echo $id?>,
                                "pubDate": $myCom_time<?php echo $id?>,
                                "myCom_text": $myCom_text<?php echo $id?>,
                                "answer_for": $answer_for_<?php echo $id?>
                            },
                            response: 'text',
                            success: function (data) {
                                var obj = JSON.parse(data);
                                    $("#comForCom<?php echo $id?>").append("" +
                                        "<ul>" +
                                            "<li>"+obj.author_name+" ("+obj.pub_date+"):</li>" +
                                            "<li>"+obj.com_text+"</li>" +
                                        "</ul>");
                                //Прокручиваем чат до самого конца
                                $("#comForCom<?php echo $id?>").scrollTop(2000);
                                $("#button<?php echo $id?>").html('Комент отправлен');
                            }
                        })
                    }
                });
            });
        </script>
        <?php
    }

}?>