<?php

namespace DrupalUtils\EntityConvertTest\Entity;

use PHPUnit\Framework\TestCase;

use DrupalUtils\EntityConvert\Entity\Taxonomy;
use DrupalUtils\EntityConvert\EntityConvert;
use DrupalUtils\EntityConvertTest\Entity\Mock\Entity;

class TaxonomyTest extends TestCase {

  public function testFieldSingleValue() {
    $taxonomy = new Taxonomy();
    $this->assertTrue($taxonomy->isSingleValuedField('tid'));
    $this->assertTrue($taxonomy->isSingleValuedField('vid'));
    $this->assertTrue($taxonomy->isSingleValuedField('uuid'));
    $this->assertFalse($taxonomy->isSingleValuedField('nid'));
  }

  public function testTaxonomyMockObject() {
    $mockedTaxonomyInstance = new Entity('taxonomy_term', 'tid');
    $ec = new EntityConvert();
    $parsedTaxonomy = $ec->toArray($mockedTaxonomyInstance);
    $this->assertArrayHasKey('tid', $parsedTaxonomy);
    $this->assertSame(PHP_INT_MAX, $parsedTaxonomy['tid']);
  }
}
