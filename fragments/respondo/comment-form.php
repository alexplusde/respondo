<?php

/** @var rex_fragment $this */

$this->getVar('parent_id', null);

$yform = new rex_yform();
$yform->setObjectparams('form_name', 'table-rex_respondo');
$yform->setObjectparams('form_action', rex_getUrl('REX_ARTICLE_ID'));
$yform->setObjectparams('form_ytemplate', $this->getVar('form_ytemplate', 'bootstrap'));
$yform->setObjectparams('form_showformafterupdate', 0);
$yform->setObjectparams('real_field_names', true);

$yform->setValueField('text', ['author',rex_i18n::msg('respondo.entry.author') ,'','0','']);
$yform->setValueField('email', ['author_email',rex_i18n::msg('respondo.entry.author_email') ,'','0','','']);
$yform->setValueField('textarea', ['content',rex_i18n::msg('respondo.entry.content') ,'','0','']);

$yform->setHiddenField('status', $this->getVar('status', 0));
$yform->setHiddenField('createdate', date('Y-m-d H:i:s'));
$yform->setHiddenField('updatedate', date('Y-m-d H:i:s'));

$yform->setHiddenField('type', $this->getVar('type', 'comment'));
$yform->setHiddenField('be_link_id', "REX_ARTICLE_ID");

if($this->getVar('parent_id', null)) {
    $yform->setHiddenField('parent_id', $this->getVar('parent_id'));
}

$yform->setValueField('uuid', ['uuid',rex_i18n::msg('respondo_entry_uuid') ,'0','1']);

/* Wenn YForm Spam Protection installiert ist, dann wird der Spam-Schutz aktiviert */
if (rex_addon::get('yform_spam_protection')->isAvailable()) {
    $yform->setValueField('spam_protection', array("honeypot","Bitte nicht ausfüllen.","Ihre Anfrage wurde als Spam erkannt und gelöscht. Bitte versuchen Sie es in einigen Minuten erneut oder wenden Sie sich persönlich an uns.", 0));
}
?>

<div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
	<?php echo $yform->getForm(); ?>
</div>
