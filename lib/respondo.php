<?php

namespace Respondo;

use rex_article;
use rex_i18n;
use rex_yform_manager_dataset;
use rex_yform_manager_table;

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

    /* Titel */
    /** @api */
    public function getTitle(): ?string
    {
        return $this->getValue('title');
    }

    /** @api */
    public function setTitle(mixed $value): self
    {
        $this->setValue('title', $value);
        return $this;
    }

    /* Inhalt */
    /** @api */
    public function getContent(bool $asPlaintext = false): ?string
    {
        if ($asPlaintext) {
            return strip_tags($this->getValue('content'));
        }
        return $this->getValue('content');
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
        return $this->getValue('author');
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
        return $this->getValue('author_email');
    }

    /** @api */
    public function setAuthorEmail(mixed $value): self
    {
        $this->setValue('author_email', $value);
        return $this;
    }

    /* Bewertung */
    /** @api */
    public function getRating(): ?float
    {
        return $this->getValue('rating');
    }

    /** @api */
    public function setRating(float $value): self
    {
        $this->setValue('rating', $value);
        return $this;
    }

    /* Status */
    /** @api */
    public function getStatus(): mixed
    {
        return $this->getValue('status');
    }

    /** @api */
    public function setStatus(mixed $param): mixed
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
}
