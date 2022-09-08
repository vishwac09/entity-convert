<?php

namespace EntityToArrayTest\Entity;

use PHPUnit\Framework\TestCase;

use \EntityToArray\Entity\Taxonomy;
use \EntityToArray\EntityToArrayAccess;

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
    $sea = new EntityToArrayAccess();
    $parsedTaxonomy = $sea->parse($mockedTaxonomyInstance);
    $this->assertArrayHasKey('tid', $parsedTaxonomy);
    $this->assertSame(PHP_INT_MAX, $parsedTaxonomy['tid']);
  }
}
