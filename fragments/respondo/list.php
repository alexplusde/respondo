<?php

/** @var rex_fragment $this */
/** @var rex_yform_table_collection $collection */

$collection = $this->getVar('collection');

$fragment = new rex_fragment();
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Einträge</h3>
    </div>
    <div class="panel-body">
<?php
foreach ($collection as $entry) {
    $fragment->setVar('entry', $entry, false);
    echo $fragment->parse('respondo/entry.php');
}

?>
    </div>
</div>
