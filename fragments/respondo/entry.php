<?php

/** @var $this rex_fragment */
/** @var $entry Respondo\Entry */

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
