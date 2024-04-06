<?php

use Respondo\Entry;

/** @var rex_fragment $this */
/** @var Entry $entry */
$entry = $this->getVar('entry');
?>
    <div style="border: 1px solid grey; padding: 10px;">
        <div>
            <span class="font-weight-bold"><?= $entry->getAuthor() ?: '&nbsp;' ?></span>
        </div>
        <small><?= $entry->getAuthorEmail() ?: '&nbsp;' ?></small>
        <small class="c-badge"><?= $entry->getStatusFormatted() ?></small>
        <small class="pull-right"><?= $entry->getCreatedateFormatted() ?></small>
        <?php if ($entry->getTitle()): ?>
            <p class="font-weight-bold"><?= $entry->getTitle() ?: '&nbsp;' ?></p>
        <?php endif ?>
        <p class="text-justify comment-text mb-0"><?= mb_substr($entry->getContent(), 0, 240, 'UTF-8') ?></p>
        <div class="btn-group">
            <a href="#" class="btn btn-sm btn-danger"><?= rex_i18n::msg('respondo_spam_delete') ?></a>
        </div>
        <div class="btn-group pull-right">
            <a href="<?= $entry->getTableManagerEditUrl() ?>" class="btn btn-default btn-sm"><?= rex_i18n::msg('respondo_spam_edit') ?></a>
            <a href="#" class="btn btn-success btn-sm"><?= rex_i18n::msg('respondo_spam_approve') ?></a>
        </div>
    </div>
