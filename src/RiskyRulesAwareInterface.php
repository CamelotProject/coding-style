<?php

declare(strict_types=1);

namespace Camelot\CsFixer;

/**
 * An object implementing this interface can be passed to {@see \Camelot\CsFixer\Config::addRules}
 * to automatically allow risky rules.
 *
 * @author Carson Full <carsonfull@gmail.com>
 */
interface RiskyRulesAwareInterface
{
    /** Whether risky rules have been included. */
    public function isRisky(): bool;
}
