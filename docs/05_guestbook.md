# Guestbook - Gästebucheinträge

Gästebücher sind öffentliches Feedback, das von Besuchern der Website verfasst wird. Gästebucheinträge können in der Regel von jedem Besucher der Website verfasst werden, sofern sie nicht durch Moderation eingeschränkt sind.

Dazu wird in der Datenbank-Tabelle `rex_respondo` das Feld `type` mit `guestbook` befüllt. Es gibt auch Felder für den Namen und die E-Mail-Adresse des Autors, die optional sein können.

Das Gästebuch ist flexibel: Es kann an einen Artikel gekoppelt werden, um somit mehrere Gästebücher zu ermöglichen, oder einzeln als globales Gästebuch verwendet werden. Ersteres wird über das Feld `be_link_id` ermöglicht, in dem eine Artikel-Id gespeichert wird. Und anschließend in der Frontend-Ausgabe danach gefiltert wird.

## Frontend Ausgabe-Beispiel

Respondo kommt mit passenden Ausgabe-Fragmenten für Bootstrap 5 (siehe "Fragemente"). Gebe alle Gästebucheinträge mit Eingabeformular zu einem Artikel aus, indem du diesen Code in deinem Template oder einem Modul verwendest:

```php
$fragment = new rex_fragment();
echo $fragment->parse('respondo/guestbook.php');
```

Wie Fragmente funktionieren, erfährst du in der [Dokumentation zu Fragmenten](04_fragments.md).
