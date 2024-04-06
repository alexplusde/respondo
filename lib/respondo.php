<?php

namespace Respondo;

use DateTime;
use rex_article;
use rex_i18n;
use rex_yform_manager;
use rex_yform_manager_collection;
use rex_yform_manager_dataset;
use rex_yform_manager_table;

use const ENT_QUOTES;

class Entry extends rex_yform_manager_dataset
{
    public static function statusValues(): array
    {
        return [
            '2' => rex_i18n::msg('respondo_entry_status_featured'),
            '1' => rex_i18n::msg('respondo_entry_status_published'),
            '0' => rex_i18n::msg('respondo_entry_status_new'),
            '' => rex_i18n::msg('respondo_entry_status_empty'),
            '-1' => rex_i18n::msg('respondo_entry_status_hidden'),
            '-2' => rex_i18n::msg('respondo_entry_status_spam'),
            '-3' => rex_i18n::msg('respondo_entry_status_deleted'),
        ];
    }

    public static function typeValues(): array
    {
        return [
            'table' => rex_i18n::msg('respondo_entry_type_table'),
            'article' => rex_i18n::msg('respondo_entry_type_article'),
            'guestbook' => rex_i18n::msg('respondo_entry_type_guestbook'),
            'comment' => rex_i18n::msg('respondo_entry_type_comment'),
            'review' => rex_i18n::msg('respondo_entry_type_review'),
            '' => rex_i18n::msg('respondo_entry_type_other'),
        ];
    }

    public static function ratingValues(): array
    {
        return [
            '1' => '★',
            '2' => '★★',
            '3' => '★★★',
            '4' => '★★★★',
            '5' => '★★★★★',
        ];
    }

    public static function YformTableKeyValues(): array
    {
        $yform_tables = rex_yform_manager_table::getAll();
        $yform_table_keys = [];
        $yform_table_keys[''] = rex_i18n::msg('respondo_table_key_empty');
        foreach ($yform_tables as $yform_table) {
            $yform_table_keys[$yform_table->getTableName()] = $yform_table->getName();
        }
        return $yform_table_keys;
    }

    public static function getComments(): ?rex_yform_manager_collection
    {
        return self::query()
            ->where('type', 'comment')
            ->orderBy('createdate', 'DESC')
            ->find();
    }

    public function getChildren(): ?rex_yform_manager_collection
    {
        return self::query()
            ->where('parent_id', $this->getId())
            ->orderBy('createdate', 'ASC')
            ->find();
    }

    public static function getReviews(): ?rex_yform_manager_collection
    {
        return self::query()
            ->where('type', 'review')
            ->orderBy('createdate', 'DESC')
            ->find();
    }

    public static function getGuestbookEntries(): ?rex_yform_manager_collection
    {
        return self::query()
            ->where('type', 'guestbook')
            ->orderBy('createdate', 'DESC')
            ->find();
    }

    public static function getArticleComments(int $articleId): ?rex_yform_manager_collection
    {
        return self::query()
            ->where('type', 'comment')
            ->where('be_link_id', $articleId)
            ->orderBy('createdate', 'DESC')
            ->find();
    }

    public static function getEntriesByTable(string $tableKey, ?int $datasetId = null): ?rex_yform_manager_collection
    {
        if ($datasetId) {
            return self::query()
                ->where('yform_table_key', $tableKey)
                ->where('yorm_table_dataset_id', $datasetId)
                ->orderBy('createdate', 'DESC')
                ->find();
        }
        return self::query()
            ->where('yform_table_key', $tableKey)
            ->orderBy('createdate', 'DESC')
            ->find();
    }

    public static function getModeration(): ?rex_yform_manager_collection
    {
        return self::query()
            ->where('status', 0)
            ->orderBy('createdate', 'DESC')
            ->find();
    }

    public static function getSpam(): ?rex_yform_manager_collection
    {
        return self::query()
            ->where('status', -2)
            ->orderBy('createdate', 'DESC')
            ->find();
    }

    public function getCreatedateFormatted(): string
    {
        $now = new DateTime();
        $date = new DateTime($this->getCreatedate());
        $interval = $now->diff($date);

        if ($interval->y >= 1) {
            return 'vor ' . $interval->y . ' Jahr(en)';
        }
        if ($interval->m >= 1) {
            return 'vor ' . $interval->m . ' Monat(en)';
        }
        if ($interval->d >= 1) {
            return 'vor ' . $interval->d . ' Tag(en)';
        }
        if ($interval->h >= 1) {
            return 'vor ' . $interval->h . ' Stunde(n)';
        }
        if ($interval->i >= 1) {
            return 'vor ' . $interval->i . ' Minute(n)';
        }
        return 'vor ' . $interval->s . ' Sekunde(n)';
    }

    public function getStatusFormatted(): string
    {
        $status = $this->getStatus();
        $statusValues = self::statusValues();
        return $statusValues[$status] ?? $statusValues[''];
    }

    public function getTableManagerEditUrl()
    {
        $table_name = $this->getTableName();
        return rex_yform_manager::url($table_name, $this->getId());
    }

    /* Titel */
    /** @api */
    public function getTitle(): ?string
    {
        return htmlspecialchars($this->getValue('title'), ENT_QUOTES, 'UTF-8');
    }

    /** @api */
    public function setTitle(mixed $value): self
    {
        $this->setValue('title', $value);
        return $this;
    }

    public function getContent(bool $asPlaintext = false): ?string
    {
        $content = $this->getValue('content');

        if ($asPlaintext) {
            return nl2br(strip_tags($content, '<br>,<strong>'));
        }

        // Konvertiert spezielle Zeichen in HTML-Entitäten und behält Zeilenumbrüche bei
        return nl2br(htmlspecialchars($content, ENT_QUOTES, 'UTF-8'));
    }

    /** @api */
    public function setContent(mixed $value): self
    {
        $this->setValue('content', $value);
        return $this;
    }

    /* Autor */
    /** @api */
    public function getAuthor(): ?string
    {
        return htmlspecialchars($this->getValue('author'), ENT_QUOTES, 'UTF-8');
    }

    /** @api */
    public function setAuthor(mixed $value): self
    {
        $this->setValue('author', $value);
        return $this;
    }

    /* E-Mail-Adresse */
    /** @api */
    public function getAuthorEmail(): ?string
    {
        return htmlspecialchars($this->getValue('author_email'), ENT_QUOTES, 'UTF-8');
    }

    /** @api */
    public function setAuthorEmail(mixed $value): self
    {
        $this->setValue('author_email', $value);
        return $this;
    }

    /* Bewertung */
    /** @api */
    public function getRating(): ?int
    {
        return $this->getValue('rating');
    }

    public function getRatingStars(): string
    {
        $rating = $this->getRating();
        $stars = '';
        for ($i = 0; $i < 5; ++$i) {
            $stars .= $rating > $i ? '★' : '☆';
        }
        return $stars;
    }

    /** @api */
    public function setRating(int $value): self
    {
        $this->setValue('rating', $value);
        return $this;
    }

    /* Status */
    /** @api */
    public function getStatus(): int
    {
        return (int) $this->getValue('status');
    }

    /** @api */
    public function setStatus(int $param): self
    {
        $this->setValue('status', $param);
        return $this;
    }

    /* Erstellungsdatum */
    /** @api */
    public function getCreatedate(): ?string
    {
        return $this->getValue('createdate');
    }

    /** @api */
    public function setCreatedate(string $value): self
    {
        $this->setValue('createdate', $value);
        return $this;
    }

    /* Aktualisierungsdatum */
    /** @api */
    public function getUpdatedate(): ?string
    {
        return $this->getValue('updatedate');
    }

    /** @api */
    public function setUpdatedate(string $value): self
    {
        $this->setValue('updatedate', $value);
        return $this;
    }

    /* Gehört zu */
    /** @api */
    public function getParentId(): ?self
    {
        return $this->getRelatedDataset('parent_id');
    }

    /* Typ */
    /** @api */
    public function getType(): ?string
    {
        return $this->getValue('type');
    }

    /** @api */
    public function setType(mixed $value): self
    {
        $this->setValue('type', $value);
        return $this;
    }

    /* Artikel-ID */
    /** @api */
    public function getBeLink(bool $asArticle = false): ?rex_article
    {
        return rex_article::get($this->getValue('be_link_id'));
    }

    public function getBeLinkId(): ?int
    {
        return $this->getValue('be_link_id');
    }

    public function getBeLinkUrl(): ?string
    {
        if ($article = rex_article::get($this->getBeLinkId())) {
            return $article->getUrl();
        }
    }

    /** @api */
    public function setBeLinkId(string $id): self
    {
        if (rex_article::get($id)) {
            $this->getValue('be_link_id', $id);
        }
        return $this;
    }

    /* YForm-Tabelle */
    /** @api */
    public function getYformTableKey(): ?string
    {
        return $this->getValue('yform_table_key');
    }

    /** @api */
    public function setYformTableKey(mixed $value): self
    {
        $this->setValue('yform_table_key', $value);
        return $this;
    }

    /* Datensatz-ID */
    /** @api */
    public function getYormTableDatasetId(): ?int
    {
        return $this->getValue('yorm_table_dataset_id');
    }

    /** @api */
    public function setYormTableDatasetId(int $value): self
    {
        $this->setValue('yorm_table_dataset_id', $value);
        return $this;
    }

    /* UUID */
    /** @api */
    public function getUuid(): mixed
    {
        return $this->getValue('uuid');
    }

    /** @api */
    public function setUuid(mixed $value): self
    {
        $this->setValue('uuid', $value);
        return $this;
    }

    /* Moderation */

    public function saveAsSpam(bool $save = false): self
    {
        $this->setStatus(-2);
        if ($save) {
            $this->save();
        }
        return $this;
    }

    public function setAsHidden(bool $save = false): self
    {
        $this->setStatus(-1);
        if ($save) {
            $this->save();
        }
        return $this;
    }

    public function setAsDeleted(bool $save = false): self
    {
        $this->setStatus(-3);
        if ($save) {
            $this->save();
        }
        return $this;
    }

    public function setAsPublished(bool $save = false): self
    {
        $this->setStatus(1);
        if ($save) {
            $this->save();
        }
        return $this;
    }

    public function setAsFeatured(bool $save = false): self
    {
        $this->setStatus(2);
        if ($save) {
            $this->save();
        }
        return $this;
    }

    public function isSpam(): bool
    {
        return $this->getStatus() === -2;
    }

    public function isHidden(): bool
    {
        return $this->getStatus() === -1;
    }

    public function isDeleted(): bool
    {
        return $this->getStatus() === -3;
    }

    public function isPublished(): bool
    {
        return $this->getStatus() === 1;
    }

    public function isFeatured(): bool
    {
        return $this->getStatus() === 2;
    }

    public function needsModeration(): bool
    {
        return $this->getStatus() === 0;
    }
}
