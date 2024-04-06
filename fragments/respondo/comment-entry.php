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
                    <small class="c-badge"><?= $entry->getStatusFormatted() ?></small>
                </div>
                <small><?= $entry->getCreatedateFormatted() ?></small>
            </div>
            <p class="text-justify comment-text mb-0"><?= $entry->getContent() ?></p>
            <div class="d-flex flex-row user-feed">
            <!--
                <span class="wish"><i class="fa fa-heartbeat mr-2"></i></span>
                <span class="ml-3"><i class="fa fa-comments-o mr-2"></i>Reply</span>
            -->
            </div>
        </div>
    </div>
</div>
