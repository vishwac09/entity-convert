<?php

namespace EntityToArray;

use EntityToArray\Entity\Block;
use EntityToArray\Entity\File;
use EntityToArray\Entity\Node;
use EntityToArray\Entity\Taxonomy;
use EntityToArray\Entity\User;
use EntityToArray\Entity\EntityInterface;
use EntityToArray\Exception\EntityToArrayException;

/**
 * Helper class which simplifies access Entity objects fields & values. 
 */
final class EntityToArrayAccess {

  /**
   * Default constructor.
   */
  function __construct() {}

  /**
   * Parse the given entity instance.
   *
   * @param Object $instance
   *   The Entity instance to parse.
   */
  public function parse($instance = null) {
    if (!isset($instance)) {
      return null;
    }
    try {
      $obj = $this->parseInstance($instance->getEntityTypeId());
      $parsedInstance = $obj->parse($instance);
      return $parsedInstance->toArray();
    }
    catch (\Exception $e) {
      throw new EntityToArrayException(
        'Unable to parse the passed Entity instance.'
      );
    }
  }

  /**
   * Function determines the type of instance and parses it.
   * 
   * @param string $type
   *   The Entity instance to parse.
   * @return EntityInterface
   *   Instance of \EntityToArray\Entity\EntityInterface
   *
   * @throws EntityToArrayException if invalid argument type
   */
  public function parseInstance($type) {
    // @todo remove this when php8.0 to match expression.
    switch($type) {
      case 'node':
        return new Node();
        break;
      case 'taxonomy_term':
        return new Taxonomy();
        break;
      case 'user':
        return new User();
        break;
      case 'file':
        return new File();
        break;
      case 'block':
        return new Block();
        break;
      default:
        throw new EntityToArrayException(
          'Invalid Entity type passed, accepted node, file, taxonomy and user.'
        );
    }
  }
}