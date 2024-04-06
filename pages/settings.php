<?php

echo rex_view::title(rex_i18n::msg('respondo_title'));

$addon = rex_addon::get('respondo');

$form = rex_config_form::factory($addon->getName());

$field = $form->addInputField('text', 'editor', null, ['class' => 'form-control']);
$field->setLabel(rex_i18n::msg('respondo_editor'));
$field->setNotice('z.B. <code>class="form-control redactor-editor--default"</code>');

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', $addon->i18n('respondo_config'), false);
$fragment->setVar('body', $form->get(), false);
echo $fragment->parse('core/page/section.php');
