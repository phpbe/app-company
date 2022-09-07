<?php

namespace Be\App\Company\Section\Message;

use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'center'];

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssBackgroundColor('message');
        echo $this->getCssPadding('message');
        echo $this->getCssMargin('message');
        echo '</style>';
    }

    public function display()
    {
        if ($this->config->enable) {

            $this->css();

            echo '<div class="message">';

            if ($this->position === 'middle' && $this->config->width === 'default') {
                echo '<div class="be-container">';
            }

            echo $this->page->tag0('be-section-title');
            echo $this->config->title;
            echo $this->page->tag1('be-section-title');

            echo $this->page->tag0('be-section-content');
            echo '<form id="form-message-'. $this->id . '">';

            echo '<input type="hidden" name="page_url" value="' . \Be\Be::getRequest()->getUrl() . '">';
            echo '<input type="hidden" name="page_title" value="' . ($this->page->title ?? '') . '">';

            $my = \Be\Be::getUser();

            echo '<div class="be-floating be-mt-150">';
            echo '<input type="text" name="name" class="be-input" placeholder="请输入您的名字" value="' . ($my->isGuest() ? '' : $my->name) . '" maxlength="60">';
            echo '<label class="be-floating-label">您的名字';
            if ($this->config->nameRequired) {
                echo '<span class="be-c-red">*</span>';
            }
            echo '</label>';
            echo '</div>';

            echo '<div class="be-floating be-mt-150">';
            echo '<input type="text" name="email" class="be-input" placeholder="请输入您的邮箱" value="' . ($my->isGuest() ? '' : $my->email) . '" maxlength="60">';
            echo '<label class="be-floating-label">您的邮箱';
            if ($this->config->emailRequired) {
                echo '<span class="be-c-red">*</span>';
            }
            echo '</label>';
            echo '</div>';

            echo '<div class="be-floating be-mt-150">';
            echo '<input type="text" name="mobile" class="be-input" placeholder="请输入您的手机号" value="' . ($my->isGuest() ? '' : $my->email) . '" maxlength="60">';
            echo '<label class="be-floating-label">您的手机号';
            if ($this->config->mobileRequired) {
                echo '<span class="be-c-red">*</span>';
            }
            echo '</label>';
            echo '</div>';

            echo '<div class="be-floating be-mt-150">';
            echo '<textarea name="content" id="contact-content" class="be-textarea" placeholder="留言内容" rows="6"></textarea>';
            echo '<label class="be-floating-label">内容</label>';
            echo '</div>';

            echo '<div class="be-mt-150">';
            echo '<input type="submit" class="be-btn be-btn-main" value="保 存">';
            echo '<input type="reset" class="be-btn be-ml-100" value="重 置">';
            echo '</div>';

            echo '</form>';

            echo $this->page->tag1('be-section-content');

            if ($this->position === 'middle' && $this->config->width === 'default') {
                echo '</div>';
            }

            echo '</div>';

            $this->js();
        }
    }

    private function js()
    {
        ?>
        <script type="text/javascript" language="javascript" src="<?PHP ECHO \Be\Be::getProperty('App.Company')->getWwwUrl(); ?>/js/jquery.validate.min.js"></script>
        <script>
            $(function () {
                $("#form-message-<?php echo $this->id; ?>").validate({
                    rules: {
                        <?php if ($this->config->nameRequired) { ?>
                        name: {
                            required: true
                        },
                        <?php } ?>

                        <?php if ($this->config->emailRequired) { ?>
                        email: {
                            required: true,
                            email: true
                        },
                        <?php } ?>

                        <?php if ($this->config->mobileRequired) { ?>
                        mobile: {
                            required: true
                        },
                        <?php } ?>

                        content: {
                            required: true,
                            maxlength: 500
                        }
                    },
                    messages: {
                        <?php if ($this->config->nameRequired) { ?>
                        name: {
                            required: "请输入您的名字"
                        },
                        <?php } ?>

                        <?php if ($this->config->emailRequired) { ?>
                        email: {
                            required: "请输入您的邮箱",
                            email: "邮箱格式不对"
                        },
                        <?php } ?>

                        <?php if ($this->config->mobileRequired) { ?>
                        mobile: {
                            required: "请输入您的手机号"
                        },
                        <?php } ?>

                        content: {
                            required: "请输入肉容",
                            maxlength: "最多输入{0}个字符"
                        }
                    },

                    submitHandler: function (form) {

                        let $submit = $(".btn-submit", $(form));
                        let sValue = $submit.val();

                        $submit.prop("disabled", true).val("正在提交，请稍候...");

                        $.ajax({
                            type: "POST",
                            url: "<?php echo beUrl('Company.Message.save'); ?>",
                            data: $(form).serialize(),
                            dataType: "json",
                            success: function (json) {
                                $submit.prop("disabled", false).val(sValue);
                                alert(json.message);
                                if (json.success) {
                                    $("#contact-content").val("");
                                }
                            }
                        });

                    }
                });
            });
        </script>
        <?php
    }

}
