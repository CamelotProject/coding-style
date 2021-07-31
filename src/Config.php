<?php

declare(strict_types=1);

namespace Camelot\CsFixer;

/**
 * A CS Fixer Config that is easier to configure.
 *
 * @author Carson Full <carsonfull@gmail.com>
 */
class Config extends \PhpCsFixer\Config
{
    public static function create(string $name = 'default'): self
    {
        return new self($name);
    }

    /**
     * Add directories to scan.
     *
     * @param string[] $dirs Directory paths
     *
     * @throws \InvalidArgumentException if one of the directories does not exist
     */
    public function in(...$dirs): self
    {
        $this->getFinder()->in($dirs);

        return $this;
    }

    /**
     * Add to the current rules. Overrides existing rules.
     *
     * See {@see setRules} for the format of these rules.
     */
    public function addRules(iterable $rules): self
    {
        if ($rules instanceof RiskyRulesAwareInterface && $rules->isRisky()) {
            $this->setRiskyAllowed(true);
        }

        if ($rules instanceof \Traversable) {
            $rules = iterator_to_array($rules);
        }

        if (!\is_array($rules)) {
            throw new \InvalidArgumentException('Expected rules to be an iterable.');
        }

        $rules = array_replace($this->getRules(), $rules);

        $this->setRules($rules);

        return $this;
    }
}
