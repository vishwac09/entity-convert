<?php

namespace SimpleEntitiesTest\Entity;

use PHPUnit\Framework\TestCase;

use \SimpleEntities\Entity\Taxonomy;
use \SimpleEntities\SimpleEntityAccess;

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
    $sea = new SimpleEntityAccess();
    $parsedTaxonomy = $sea->parse($mockedTaxonomyInstance);
    $this->assertSame(PHP_INT_MAX, $parsedTaxonomy->tid);
    $this->assertNull($parsedTaxonomy->id);
  }
}
