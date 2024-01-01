<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner\Filter;

use function preg_match;
use function sprintf;
use function str_replace;
use Exception;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ExcludeNameFilterIterator extends NameFilterIterator
{
    /**
     * @throws Exception
     */
    protected function setFilter(string $filter): void
    {
        if (@preg_match($filter, '') === false) {
            $filter = sprintf(
                '/^(?:(?!%s).)*/i',
                str_replace(
                    '/',
                    '\\/',
                    $filter,
                ),
            );
        }

        $this->filter = $filter;
    }
}
