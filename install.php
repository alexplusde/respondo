<?php

/* Tablesets aktualisieren */
$addon = rex_addon::get('respondo');

if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_table_api::importTablesets(rex_file::get(rex_path::addon($addon->getName(), 'install/rex_respondo.tableset.json')));
    rex_yform_manager_table::deleteCache();
}
