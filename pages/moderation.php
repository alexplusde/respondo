<?php

echo rex_view::title(rex_i18n::msg('respondo_title'));

$fragment = new rex_fragment();
$fragment->setVar('title', rex_i18n::msg('respondo_moderation_title'));
$fragment->setVar('content', '<div class="alert alert-info">' . rex_i18n::msg('respondo_moderation_info') . '</div>', false);
echo $fragment->parse('/respondo/backend/moderation.php');
