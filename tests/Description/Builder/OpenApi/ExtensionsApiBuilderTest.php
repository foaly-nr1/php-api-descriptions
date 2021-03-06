<?php declare(strict_types = 1);
/*
 * This file is part of the KleijnWeb\PhpApi\Descriptions package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KleijnWeb\PhpApi\Descriptions\Tests\Description\Builder\OpenApi;

use KleijnWeb\PhpApi\Descriptions\Tests\Description\Builder\OpenApiBuilderTest;

/**
 * @author John Kleijn <john@kleijnweb.nl>
 */
class ExtensionsApiBuilderTest extends OpenApiBuilderTest
{
    protected function setUp()
    {
        $this->setUpDescription('tests/definitions/openapi/extensions.yml');
    }

    /**
     * @test
     */
    public function getGetRootExtension()
    {
        $this->assertSame('foo.bar', $this->description->getExtension('root'));
    }

    /**
     * @test
     */
    public function getGetPathsExtension()
    {
        $this->assertSame('bar.foo', $this->description->getExtension('router'));
    }

    /**
     * @test
     */
    public function getGetPathItemExtension()
    {
        $this->assertSame('doh.foo', $this->description->getPath('/entity/{type}')->getExtension('router-controller'));
    }

    /**
     * @test
     */
    public function canGetOperationExtension()
    {
        $this->assertSame(
            'bar.doh',
            $this->description->getPath('/entity/{type}')->getOperation('get')->getExtension('router-controller')
        );
    }
}
