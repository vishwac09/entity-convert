<?php

namespace SimpleEntities\Entity;

/**
 * Handler for the File Entity type.
 */
class Block extends BaseEntity {

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
        'fid',
        'uuid',
        'langcode',
        'uid',
        'filename',
        'uri',
        'filemime',
        'filesize',
        'status',
        'created',
        'changed'
      ]
    );
  }

}
