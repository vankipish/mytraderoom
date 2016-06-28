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

    static public function js_validation($admin = false)
    {
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                // Code for form validation
                $("form[name=myCom_form]").validate({
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
                    errorLabelContainer: '.errorMyCom',

                    submitHandler: function(form) {

                        var $myCom_name = document.getElementById('myCom_name').value;
                        var $item_id = document.getElementById('item_id').value;
                        var $parent_com_id = document.getElementById('parent_com_id').value;
                        var $myCom_email = document.getElementById('myCom_email').value;
                        var $myCom_time = document.getElementById('myCom_time').value;
                        var $myCom_text = document.getElementById('myCom_text').value;

                        $.ajax
                        ({
                            type: "POST",
                            url: '<?php echo osc_base_url(true); ?>?page=ajax&action=myCom',
                            data: {
                                "myCom_name": $myCom_name,
                                "item_id": $item_id,
                                "parent_com_id": $parent_com_id,
                                "myCom_email": $myCom_email,
                                "pubDate": $myCom_time,
                                "myCom_text": $myCom_text
                            },
                            response: 'text',
                            success: function (data) {
                                alert(data);
                                var obj = JSON.parse(data);
                                    $("#result").append("<li>"+obj.author_name+"<br>: "+obj.com_text+"</li><br>");
                                //Прокручиваем чат до самого конца
                                $("#msg-box").scrollTop(2000);
                                $("#button").html('Комент отправлен');

                            }
                        })
                    }
                });
            });
        </script>
        <?php
    }

}?>