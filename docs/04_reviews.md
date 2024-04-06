# Reviews: Feedback und Bewertungen

Reviews sind Kommentare, die auf Artikel oder andere Inhalte bezogen sind. Sie sind eine Möglichkeit, um Feedback und Bewertungen zu erhalten. Reviews enthalten zusätzlich eine Bewertung, die in der Regel in Form von Sternen dargestellt wird.

Dazu wird in der Datenbank-Tabelle `rex_respondo` das Feld `type` mit `review` befüllt und zusätzlich das Feld `rating` verwendet. Dieses Feld enthält die Bewertung des Reviews in Form einer Zahl zwischen 1 und 5.

Optional können Reviews auch entweder einem Artikel oder einem YForm-Datensatz zugeordnet werden. Dazu wird das Feld `be_link_id` für einen Backend-Link oder die Felder `yform_table_key` und `yform_dataset_id` für einen YForm-Datensatz verwendet.

## Frontend Ausgabe-Beispiel

Respondo kommt mit passenden Ausgabe-Fragmenten für Bootstrap 5 (siehe "Fragemente"). Gebe alle Kommentare als Thread mit Eingabeformular zu einem Artikel aus, indem du diesen Code in deinem Template oder einem Modul verwendest:

```php
$fragment = new rex_fragment();
echo $fragment->parse('respondo/review.php');
```

Wie Fragmente funktionieren, erfährst du in der [Dokumentation zu Fragmenten](04_fragments.md).
