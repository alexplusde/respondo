<?php

use Respondo\Entry;

/** @var rex_fragment $this */
/** @var Entry $entry */
$entry = $this->getVar('entry');
?>
    <div style="border: 1px solid grey; padding: 10px;">
        <div>
            <small class="pull-right">
                <span class="c-badge"><?= $entry->getStatusFormatted() ?></span>, 
                <?= $entry->getCreatedateFormatted() ?>
            </small>
            <span class="font-weight-bold"><?= $entry->getAuthor() ?: '&nbsp;' ?></span>
        </div>
        <small><?= $entry->getAuthorEmail() ?: '&nbsp;' ?></small>
        <?php if ($entry->getTitle()): ?>
            <p class="font-weight-bold"><?= $entry->getTitle() ?: '&nbsp;' ?></p>
        <?php endif ?>
        <p class="text-justify comment-text mb-0"><?= mb_substr($entry->getContent(), 0, 240, 'UTF-8') ?></p>
        <div class="btn-group">
            <a href="#" class="btn btn-sm btn-danger"><?= rex_i18n::msg('respondo_moderation_delete') ?></a>
            <a href="#" class="btn btn-sm btn-warning"><?= rex_i18n::msg('respondo_moderation_spam') ?></a>
        </div>
        <div class="btn-group pull-right">
            <a href="<?= $entry->getTableManagerEditUrl() ?>" class="btn btn-default btn-sm"><?= rex_i18n::msg('respondo_moderation_edit') ?></a>
            <a href="#" class="btn btn-success btn-sm"><?= rex_i18n::msg('respondo_moderation_approve') ?></a>
        </div>
    </div>
