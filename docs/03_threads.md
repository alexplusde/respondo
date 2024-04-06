# Threads

Threads sind Kommentare, die auf andere Kommentare antworten. Sie sind eine Möglichkeit, um Diskussionen zu strukturieren und zu verfolgen. Threads können beliebig tief verschachtelt sein.

Dazu wird in der Datenbank-Tabelle `rex_respondo` das Feld `type` mit `comment` befüllt und zusätzlich das Feld `parent_id` verwendet. Dieses Feld enthält die ID des übergeordneten Kommentars. Ein Kommentar ohne übergeordneten Kommentar enthält keine `parent_id`.

## Frontend Ausgabe-Beispiel

Respondo kommt mit passenden Ausgabe-Fragmenten für Bootstrap 5 (siehe "Fragemente"). Gebe alle Kommentare als Thread mit Eingabeformular zu einem Artikel aus, indem du diesen Code in deinem Template oder einem Modul verwendest:

```php
$fragment = new rex_fragment();
echo $fragment->parse('respondo/thread.php');
```

Wie Fragmente funktionieren, erfährst du in der [Dokumentation zu Fragmenten](04_fragments.md).
