<?php

/** @var rex_fragment $this */
/** @var Respondo\Entry $entry */

$entry = $this->getVar('entry');

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $entry->getTitle() ?></h3>
    </div>
    <div class="panel-body">
        <?= $entry->getContent() ?>
    </div>
</div>
