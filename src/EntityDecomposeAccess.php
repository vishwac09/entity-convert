<?php

namespace EntityDecompose;

use EntityDecompose\Entity\Block;
use EntityDecompose\Entity\File;
use EntityDecompose\Entity\Node;
use EntityDecompose\Entity\Taxonomy;
use EntityDecompose\Entity\User;
use EntityDecompose\Entity\EntityInterface;
use EntityDecompose\Exception\EntityDecomposeException;

/**
 * Helper class which simplifies access Entity objects fields & values. 
 */
final class EntityDecomposeAccess {

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
      throw new EntityDecomposeException(
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
   *   Instance of \EntityDecompose\Entity\EntityInterface
   *
   * @throws EntityDecomposeException if invalid argument type
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
        throw new EntityDecomposeException(
          'Invalid Entity type passed, accepted node, file, taxonomy and user.'
        );
    }
  }
}