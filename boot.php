<?php

// Die boot.php wird bei jedem Seitenaufruf im Frontend und Backend aufgeführt, je nach Reihenfolge von Abhängigkeiten in der package.yml vor oder nach anderen Addons.

if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_dataset::setModelClass(
        'rex_respondo',
        Respondo\Entry::class
    );
}

// Prüfen, ob ein anderes Addon installiert ist, bspw. Cronjob-Addon
/*
if (rex_addon::get('cronjob')->isAvailable() && !rex::isSafeMode()) {
    rex_cronjob_manager::registerType('rex_cronjob_respondo');
}
*/

if (rex::isBackend() && 'respondo' == rex_be_controller::getCurrentPagePart(1) || 'yform/manager/data_edit' == rex_be_controller::getCurrentPage()) {
    rex_extension::register('OUTPUT_FILTER', static function (rex_extension_point $ep) {
        $suchmuster = 'class="###respondo-settings-editor###"';
        $ersetzen = rex_config::get('respondo', 'editor');
        $ep->setSubject(str_replace($suchmuster, $ersetzen, $ep->getSubject()));
    });
}
