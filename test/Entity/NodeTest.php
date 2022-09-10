<?php

namespace EntityConvertTest\Entity;

use PHPUnit\Framework\TestCase;

use EntityConvert\Entity\Node;
use EntityConvert\EntityConvertFactory;
use EntityConvertTest\Entity\Mock\Entity;

class NodeTest extends TestCase {

  public function testFieldSingleValue() {
    $node = new Node();
    $this->assertTrue($node->isSingleValued('nid'));
    $this->assertTrue($node->isSingleValued('type'));
    $this->assertTrue($node->isSingleValued('uuid'));
    $this->assertFalse($node->isSingleValued('uuiid'));
  }

  public function testNodeMockObject() {
    $mockedNodeInstance = new Entity('node', 'nid');
    $sea = new EntityConvertFactory();
    $parsedNode = $sea->toArray($mockedNodeInstance);
    $this->assertArrayHasKey('nid', $parsedNode);
    $this->assertSame(PHP_INT_MAX, $parsedNode['nid']);
  }
}
