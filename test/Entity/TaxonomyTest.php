<?php

namespace EntityConvertTest\Entity;

use PHPUnit\Framework\TestCase;

use EntityConvert\Entity\Taxonomy;
use EntityConvert\EntityConvertAccess;
use EntityConvertTest\Entity\Mock\Entity;

class TaxonomyTest extends TestCase {

  public function testFieldSingleValue() {
    $taxonomy = new Taxonomy();
    $this->assertTrue($taxonomy->isSingleValued('tid'));
    $this->assertTrue($taxonomy->isSingleValued('vid'));
    $this->assertTrue($taxonomy->isSingleValued('uuid'));
    $this->assertFalse($taxonomy->isSingleValued('nid'));
  }

  public function testTaxonomyMockObject() {
    $mockedTaxonomyInstance = new Entity('taxonomy_term', 'tid');
    $sea = new EntityConvertAccess();
    $parsedTaxonomy = $sea->toArray($mockedTaxonomyInstance);
    $this->assertArrayHasKey('tid', $parsedTaxonomy);
    $this->assertSame(PHP_INT_MAX, $parsedTaxonomy['tid']);
  }
}
