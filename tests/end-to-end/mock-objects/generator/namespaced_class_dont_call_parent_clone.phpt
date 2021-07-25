--TEST--
\PHPUnit\Framework\MockObject\Generator::generate('NS\Foo', [], 'MockFoo', false)
--FILE--
<?php declare(strict_types=1);
namespace NS;

class Foo
{
        public function __clone()
    {
    }
}

require_once __DIR__ . '/../../../../vendor/autoload.php';

$generator = new \PHPUnit\Framework\MockObject\Generator;

$mock = $generator->generate(
    'NS\Foo',
    [],
    'MockFoo',
    false
);

print $mock->getClassCode();
--EXPECTF--
declare(strict_types=1);

class MockFoo extends NS\Foo implements PHPUnit\Framework\MockObject\MockObject
{
    use \PHPUnit\Framework\MockObject\Api;
    use \PHPUnit\Framework\MockObject\Method;
    use \PHPUnit\Framework\MockObject\MockedCloneMethod;
}
