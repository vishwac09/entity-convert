<?php

namespace EntityDecomposeTest\Entity;

use PHPUnit\Framework\TestCase;

use \EntityDecompose\Entity\Taxonomy;
use \EntityDecompose\EntityDecomposeAccess;

class TaxonomyTest extends TestCase {

  public function testFieldSingleValue() {
    $taxonomy = new Taxonomy();
    $this->assertTrue($taxonomy->isSingleValued('tid'));
    $this->assertTrue($taxonomy->isSingleValued('vid'));
    $this->assertTrue($taxonomy->isSingleValued('uuid'));
    $this->assertFalse($taxonomy->isSingleValued('nid'));
  }

  public function testTaxonomyMockObject() {
    $mockedTaxonomyInstance = new MockEntity('taxonomy_term', 'tid');
    $sea = new EntityDecomposeAccess();
    $parsedTaxonomy = $sea->parse($mockedTaxonomyInstance);
    $this->assertArrayHasKey('tid', $parsedTaxonomy);
    $this->assertSame(PHP_INT_MAX, $parsedTaxonomy['tid']);
  }
}
