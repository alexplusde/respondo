<?php

use Respondo\Entry;

/** @var rex_fragment $this */
/** @var Entry $entry */
$entry = $this->getVar('entry');

?>
<div class="mt-2">
    <div class="d-flex flex-row p-3">
        <img src="" width="40" height="40" class="rounded-circle mr-3">
        <div class="w-100">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-row align-items-center">
                    <span class="mr-2"><?= $entry->getAuthor() ?></span>
                    <span class="mr-2"><?= $entry->getRatingStars() ?></span>
                    <small class="c-badge"><?= $entry->getStatusFormatted() ?></small>
                </div>
                <small><?= $entry->getCreatedateFormatted() ?></small>
            </div>
            <p class="h5 mt-2"><?= $entry->getTitle() ?></p>
            <p class="text-justify comment-text mb-0"><?= $entry->getContent() ?></p>
            <div class="d-flex flex-row user-feed">
            </div>
        </div>
    </div>
</div>
