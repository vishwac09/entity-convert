<?php

namespace DrupalUtils\EntityConvert\Entity;

/**
 * Handler for the File Entity type.
 */
class File extends BaseEntity {

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
