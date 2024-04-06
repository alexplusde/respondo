# Kommentare

Kommentare sind das Herzstück von Respondo.

Sie können zu beliebigen Inhalten hinzugefügt werden und sind in der Regel öffentlich sichtbar. Kommentare können von jedem Besucher der Website verfasst werden, sofern sie nicht durch Moderation eingeschränkt sind.

Um möglichst fleixbel zu sein, können Kommentare auf verschiedene Weise betrachtet und zugeordnet werden.

## Konzept - Die Zuordnung von Kommentaren

Ein Kommentar kann auf verschiedene Weisen zugeordnet werden:

* zu einem Artikel (siehe REDAXO-Artikel)
* zu einem YForm-Datensatz (z.B. News, Produkte, ... siehe YForm-Tabelle)
* zu einem anderen Kommentar (siehe Threads)

Dazu wird in der Datenbank-Tabelle `rex_respondo` das Feld `type` verwendet. Dieses Feld enthält den Typ der Zuordnung (z.B. `article`, `yform`, `comment`, `guestbook`).

> **Tipp:** Du kannst Responso um eigene Verknüpfungen erweitern, z.B. über `be_manager_relation`-Felder in YForm.

## Frontend Ausgabe-Beispiel

Respondo kommt mit passenden Ausgabe-Fragmenten für Bootstrap 5 (siehe "Fragemente"). Gebe alle Kommentare mit Eingabeformular zu einem Artikel aus, indem du diesen Code in deinem Template oder einem Modul verwendest:

```php
$fragment = new rex_fragment();
echo $fragment->parse('respondo/comment.php');;
```

Wie Fragmente funktionieren, erfährst du in der [Dokumentation zu Fragmenten](04_fragments.md).

## Getter-Methoden

Getter-Methoden sind für alle Eigenschaften verfügbar. Hier sind einige Beispiele:

```php
<?php
namespace Respondo\Entry;

$entry = Entry::get(int $id); 
// Ohne Namespace: $entry = \Respondo\Entry::get(int $id);

echo $entry->getId();
echo $entry->getChildren();
echo $entry->getCreatedateFormatted();
echo $entry->getStatusFormatted();
echo $entry->getTableManagerEditUrl();
echo $entry->getTitle();
echo $entry->getContent(bool $asPlaintext = false);
echo $entry->getAuthor();
echo $entry->getAuthorEmail();
echo $entry->getRating();
echo $entry->getRatingStars();
echo $entry->getStatus();
echo $entry->getCreatedate();
echo $entry->getUpdatedate();
echo $entry->getParentId();
echo $entry->getType();
echo $entry->getBeLink(bool $asArticle = false);
echo $entry->getBeLinkId();
echo $entry->getBeLinkUrl();
echo $entry->getYformTableKey();
echo $entry->getYormTableDatasetId();
echo $entry->getUuid();
?>
```

### Setter-Methoden

```php
<?php
namespace Respondo\Entry;
// Ohne Namespace: $entry = \Respondo\Entry::create();

$entry = Entry::create();

$entry->setTitle(mixed $value);
$entry->setContent(mixed $value);
$entry->setAuthor(mixed $value);
$entry->setAuthorEmail(mixed $value);
$entry->setRating(int $value);
$entry->setStatus(int $param);
$entry->setCreatedate(string $value);
$entry->setUpdatedate(string $value);
$entry->setType(mixed $value);
$entry->setBeLinkId(string $id);
$entry->setYformTableKey(mixed $value);
$entry->setYormTableDatasetId(int $value);
$entry->setUuid(mixed $value);

$entry->save();
?>
```

### Statische Methoden

```php
<?php
// Choice-Value-Methoden
Responso\Entry::statusValues();
Responso\Entry::typeValues();
Responso\Entry::ratingValues();
Responso\Entry::YformTableKeyValues();

// Collection-Methoden
Responso\Entry::getComments();
Responso\Entry::getReviews();
Responso\Entry::getGuestbookEntries();
Responso\Entry::getArticleComments(int $articleId);
Responso\Entry::getEntriesByTable(string $tableKey, ?int $datasetId = null);
Responso\Entry::getModeration();
Responso\Entry::getSpam();

// Kind-Einträge
Responso\Entry::getChildren(int $parentId);
?>
```
