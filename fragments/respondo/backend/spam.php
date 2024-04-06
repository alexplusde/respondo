<?php

/* Einträge, die auf Moderation warten */

use Respondo\Entry;

/** @var rex_fragment $this */

$collection = $this->getVar('collection', Entry::getSpam());

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?= rex_i18n::msg('respondo_spam_headline') ?>
    </div>
    <div class="panel-body">
        <div class="row">
        <?php
        $counter = 0;
        foreach ($collection as $entry) {
            if ($counter % 3 == 0 && $counter != 0) {
                echo '<div class="clearfix"></div>';
            }
            ?>
            <div class="col-12 col-md-4">
                <?php
                $this->setVar('entry', $entry, false);
                echo $this->subfragment('respondo/backend/spam-entry.php');
                ?>
            </div>
            <?php
            $counter++;
        }
        ?>
        </div>
    </div>
</div>
