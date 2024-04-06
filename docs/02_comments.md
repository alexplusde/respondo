# Kommentare

Kommentare sind das Herzstück von Respondo.

Sie können zu beliebigen Inhalten hinzugefügt werden und sind in der Regel öffentlich sichtbar. Kommentare können von jedem Besucher der Website verfasst werden, sofern sie nicht durch Moderation eingeschränkt sind.

Um möglichst fleixbel zu sein, können Kommentare auf verschiedene Weise betrachtet und zugeordnet werden.

## Konzept - Zuordnung von Kommentaren

Ein Kommentar kann auf verschiedene Weisen zugeordnet werden:

* zu einem Artikel (siehe REDAXO-Artikel)
* zu einem YForm-Datensatz (z.B. News, Produkte, ... siehe YForm-Tabelle)
* zu einem anderen Kommentar (siehe Threads)

Dazu wird in der Datenbank-Tabelle `rex_respondo` das Feld `type` verwendet. Dieses Feld enthält den Typ der Zuordnung (z.B. `article`, `yform`, `comment`, `guestbook`).

## Frontend Ausgabe-Beispiel

Respondo kommt mit passenden Ausgabe-Fragmenten für Bootstrap 5 (siehe "Fragemente"). Gebe alle Kommentare mit Eingabeformular zu einem Artikel aus, indem du diesen Code in deinem Template oder einem Modul verwendest:

```php
$fragment = new rex_fragment();
echo $fragment->parse('respondo/comment.php');
```

Wie Fragmente funktionieren, erfährst du in der [Dokumentation zu Fragmenten](04_fragments.md).
