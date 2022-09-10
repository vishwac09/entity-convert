<?php

namespace EntityConvert\FieldTypes;

use EntityConvert\EntityConvertAccess;
use EntityConvert\Entity\File;
use EntityConvert\Entity\Image;


use Drupal\file\Entity\File as DrupalFile;

/**
 * Group of reference category fields.
 */
trait Reference {

  /**
   * Resolver for field having type as EntityReference.
   * 
   * @param array $value
   *   The value of the field.
   * 
   * @return BaseEntity
   */
  public function get_entity_reference($value) {
    return $this->preserveType ? (int) $value['target_id'] : $value['target_id'];
  }
  
  /**
   * Resolver for field having type as File.
   * 
   * @param array $value
   *   The value of the field.
   *
   * @return mixed
   */
  public function get_file($value) {
    $file = DrupalFile::load($value['target_id']);
    $parsedEntity = (new File())->parse($file);
    return $parsedEntity->toArray();
  }

  /**
   * Resolver for field having type as Image.
   * 
   * @param array $value
   *   The value of the field.
   *
   * @return mixed
   */
  public function get_image($value) {
    $file = DrupalFile::load($value['target_id']);
    $parsedEntity = (new File())->parse($file);
    return $parsedEntity->toArray();
  }
}
