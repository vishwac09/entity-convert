<?php

namespace EntityDecomposeTest\Entity;

use PHPUnit\Framework\TestCase;

use \EntityDecompose\Entity\Node;
use \EntityDecompose\EntityDecomposeAccess;


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
    $sea = new EntityDecomposeAccess();
    $parsedNode = $sea->parse($mockedNodeInstance);
    $this->assertArrayHasKey('nid', $parsedNode);
    $this->assertSame(PHP_INT_MAX, $parsedNode['nid']);
  }
}
