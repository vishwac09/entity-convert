<?php

namespace SimpleEntities\Entity;

/**
 * Handler for the Node Entity type.
 */
class Node extends BaseEntity {

  /**
   * Default constructor
   */
  function __construct() {
    parent::__construct();
  }

  /**
   * @{inheritdoc}
   */
  public function isSingleValued($name) {
    return in_array($name, [
        'nid',
        'uuid',
        'vid',
        'langcode',
        'type',
        'revision_timestamp',
        'revision_uid',
        'revision_log',
        'status',
        'uid',
        'title',
        'created',
        'changed',
        'promote',
        'sticky',
        'default_langcode',
        'revision_default',
        'revision_translation_affected',
        'path'
      ]
    );
  }

}
