<?php

namespace EntityConvertTest\Entity\Mock;

class Entity {

  /**
   * Type of entity node, taxonomy, user, file.
   */
  protected $entityTypeId;

  /**
   * The field corresponding to the entity.
   */
  protected $field;

  /**
   * Default Constructor.
   */
  function __construct($entityTypeId = '', $field = '') {
    $this->getEntityTypeId = $entityTypeId;
    $this->field = $field;
  }

  /**
   * Return list of fields associated with the Entity.
   */
  public function getFields() {
    return [
      $this->field => new FieldsItemList()
    ];
  }

  /**
   * Return the type of the entity.
   */
  public function getEntityTypeId() {
    return $this->getEntityTypeId;
  }
}