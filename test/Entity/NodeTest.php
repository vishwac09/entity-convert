<?php

namespace SimpleEntitiesTest\Entity;

use PHPUnit\Framework\TestCase;

use \SimpleEntities\Entity\Node;
use \SimpleEntities\SimpleEntityAccess;


class NodeTest extends TestCase {

  public function testFieldSingleValue() {
    $node = new Node();
    $this->assertTrue($node->isSingleValued('nid'));
    $this->assertTrue($node->isSingleValued('type'));
    $this->assertTrue($node->isSingleValued('uuid'));
    $this->assertFalse($node->isSingleValued('uuiid'));
  }

  public function testNodeMockObject() {
    $mockedNodeInstance = new MockEntity('node', 'nid');
    $sea = new SimpleEntityAccess();
    $parsedNode = $sea->parse($mockedNodeInstance);
    $this->assertSame(PHP_INT_MAX, $parsedNode->nid);
    $this->assertNull($parsedNode->id);
  }
}
