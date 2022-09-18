<?php

namespace DrupalUtils\EntityConvertTest\Entity;

use PHPUnit\Framework\TestCase;

use DrupalUtils\EntityConvert\Entity\Node;
use DrupalUtils\EntityConvert\EntityConvert;
use DrupalUtils\EntityConvertTest\Entity\Mock\Entity;

class NodeTest extends TestCase {

  public function testFieldSingleValue() {
    $node = new Node();
    $this->assertTrue($node->isSingleValuedField('nid'));
    $this->assertTrue($node->isSingleValuedField('type'));
    $this->assertTrue($node->isSingleValuedField('uuid'));
    $this->assertFalse($node->isSingleValuedField('uuiid'));
  }

  public function testNodeMockObject() {
    $mockedNodeInstance = new Entity('node', 'nid');
    $ec = new EntityConvert();
    $parsedNode = $ec->toArray($mockedNodeInstance);
    $this->assertArrayHasKey('nid', $parsedNode);
    $this->assertSame(PHP_INT_MAX, $parsedNode['nid']);
  }
}
