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
                        comment: {
                            required: true,
                            minlength: 3,
                            maxlength: 500
                        }
                    },
                    messages: {
                        comment: {
                            required: "Введите комментарий!",
                            minlength: "Комментарий слишком короткий",
                            maxlength: "Воу воу, краткость - сестра таланта"
                        }
                    },
                    errorElement : 'div',
                    errorLabelContainer: '.errorTxt',


                    submitHandler: function(form) {
                        
                        $.ajax
                        ({
                            type: "POST",
                            url: '<?php echo osc_base_url(true); ?>?page=ajax&action=myCom',
                            data: {
                                "name": document.getElementById('myCom_name').value,
                                "itemId": document.getElementById('item_id').value,
                                "parentComId": document.getElementById('parent_com_id').value,
                                "email": document.getElementById('myCom_email').value,
                                "pubDate": document.getElementById('myCom_time').value,
                                "myComText": document.getElementById('myCom_text').value
                            },
                            response: 'text',
                            success: function (data) {
                                $("#result").html(data);
                                //$("#button").html('Оценка отправлена');
                            }
                        })
                    }
                });
            });
        </script>
        <?php
    }

}?>