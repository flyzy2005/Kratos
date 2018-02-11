<?php
/**
 * The template for displaying comments
 *
 * @package Vtrois
 * @version 2.1
 */

if (post_password_required()) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 50,
            ));
            ?>
        </ol>
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <div id="comments-nav">
                <?php paginate_comments_links('prev_text=上一页&next_text=下一页'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php
    if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
    <?php endif; ?>
    <?php include(TEMPLATEPATH . '/smiley.php'); ?>
    <?php
    $fields = array(
        'author' => '<div class="comment-form-author form-group has-feedback"><div class="input-group"><div class="input-group-addon"><i class="fa fa-user"></i></div><input class="form-control" placeholder="昵称" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" /><span class="form-control-feedback required">*</span></div></div>',
        'email' => '<div class="comment-form-email form-group has-feedback"><div class="input-group"><div class="input-group-addon"><i class="fa fa-envelope-o"></i></div><input class="form-control" placeholder="邮箱（严格保密，用来通知您有新回复）" id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" /><span class="form-control-feedback required">*</span></div></div>',
        'url' => '<div class="comment-form-url form-group has-feedback"><div class="input-group"><div class="input-group-addon"><i class="fa fa-link"></i></div><input class="form-control" placeholder="网站" id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div></div>',
    );
    $num1 = rand(0, 9);
    $num2 = rand(0, 9);
    $args = array(
        'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
        'title_reply_after' => '</h4>',
        'fields' => $fields,
        'class_submit' => 'btn btn-primary',
        'comment_field' => '<div class="comment form-group has-feedback"><div class="input-group"><p>' . $smilies . '</p><textarea class="form-control" id="comment" placeholder=" " name="comment" rows="5" aria-required="true" required  onkeydown="if(event.ctrlKey){if(event.keyCode==13){document.getElementById(\'submit\').click();return false}};"></textarea></div>' ."<label for=\"math\" style=\"margin-top: 15px\">请输入 <i>$num1 + $num2 = ?</i> 的计算结果：</label>\n" . "<input class=\"form-control\" type=\"text\" name=\"sum\" class=\"text\" value=\"\" size=\"25\" tabindex=\"4\">\n" . "<input type=\"hidden\" name=\"num1\" value=\"$num1\">\n"."<input type=\"hidden\" name=\"num2\" value=\"$num2\">". '</div>',
    );
    comment_form($args);
    ?>
</div>