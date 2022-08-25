<?php

namespace SimpleEntities;

use SimpleEntities\Entity\File;
use SimpleEntities\Entity\Node;
use SimpleEntities\Entity\Taxonomy;
use SimpleEntities\Entity\User;
use SimpleEntities\Entity\EntityInterface;
use SimpleEntities\Exception\SimpleEntitiesException;

/**
 * Helper class which simplifies access Entity objects fields & values. 
 */
final class SimpleEntityAccess {

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
      return $obj->parse($instance);
    } catch (\Exception $e) {
      throw new \SimpleEntitiesException(
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
   *   Instance of \SimpleEntities\Entity\EntityInterface
   *
   * @throws SimpleEntitiesException if invalid argument type
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
      default:
        throw new SimpleEntitiesException(
          'Invalid Entity type passed, accepted node, taxonomy and user.'
        );
    }
  }
}