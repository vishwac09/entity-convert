<?php

namespace DrupalUtils\EntityConvert\Entity;

/**
 * Handler for the Taxonomy Entity type.
 */
class Taxonomy extends BaseEntity {

  /**
   * Default constructor
   */
  function __construct() {
    parent::__construct();
  }

  /**
   * @{inheritdoc}
   */
  public function isSingleValuedField($name) {
    return in_array($name, [
        'tid',
        'uuid',
        'vid',
        'langcode',
        'revision_id',
        'revision_created',
        'revision_user',
        'revision_log_message',
        'status',
        'name',
        'description',
        'weight',
        'parent',
        'changed',
        'default_langcode',
        'revision_default',
        'revision_translation_affected',
        'path'
      ]
    );
  }

}
