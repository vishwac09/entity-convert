<?php

namespace DrupalUtils\EntityConvertTest\Entity;

use PHPUnit\Framework\TestCase;

use DrupalUtils\EntityConvert\Entity\Taxonomy;
use DrupalUtils\EntityConvert\EntityConvert;
use DrupalUtils\EntityConvertTest\Entity\Mock\Entity;

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
    $sea = new EntityConvert();
    $parsedTaxonomy = $sea->toArray($mockedTaxonomyInstance);
    $this->assertArrayHasKey('tid', $parsedTaxonomy);
    $this->assertSame(PHP_INT_MAX, $parsedTaxonomy['tid']);
  }
}
