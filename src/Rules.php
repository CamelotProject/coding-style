<?php

declare(strict_types=1);

namespace Camelot\CsFixer;

/**
 * Camelot's rules.
 *
 * @author Carson Full <carsonfull@gmail.com>
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class Rules implements \IteratorAggregate, RiskyRulesAwareInterface
{
    private $rules = [
        '@Symfony' => true,
        '@PhpCsFixer' => true,

        // Override Symfony's rules
        'braces' => [
            'allow_single_line_closure' => true,
        ],
        'concat_space' => ['spacing' => 'one'],
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
        ],
        'yoda_style' => ['equal' => false, 'identical' => false],

        // Add additional rules
        'array_syntax' => ['syntax' => 'short'],
        'blank_line_before_statement' => false,
        'comment_to_phpdoc' => false,
        'declare_strict_types' => true,
        'heredoc_to_nowdoc' => true,
        'linebreak_after_opening_tag' => true,
        'native_function_invocation' => [
            'include' => ['@compiler_optimized'],
        ],
        'no_useless_else' => true,
        'no_useless_return' => true,
        'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
        'ordered_class_elements' => true,
        'ordered_imports' => [
            'sort_algorithm' => 'alpha',
            'imports_order' => ['const', 'class', 'function'],
        ],
        'php_unit_strict' => false,
        'phpdoc_line_span' => [
            'const' => 'single',
            'method' => 'single',
            'property' => 'single',
        ],
        'phpdoc_order' => true,
        'single_line_comment_style' => ['comment_types' => ['hash']],
    ];

    private $riskyRules = [
        '@Symfony:risky' => true,
        '@PHPUnit84Migration:risky' => true,

        // Override Symfony's rules
        'is_null' => ['use_yoda_style' => false],

        // Add additional rules
        'strict_comparison' => true,
        'strict_param' => true,
    ];

    private $php70Rules = [
        '@PHP70Migration' => true,
    ];
    private $php70RulesRisky = [
        '@PHP70Migration:risky' => true,
    ];

    private $php71Rules = [
        '@PHP71Migration' => true,
        'list_syntax' => ['syntax' => 'short'],
    ];
    private $php71RulesRisky = [
        '@PHP71Migration:risky' => true,
    ];

    private $php73Rules = [
        '@PHP73Migration' => true,
    ];

    private $php74Rules = [
        '@PHP74Migration' => true,
    ];

    private $php74RulesRisky = [
        '@PHP74Migration:risky' => true,
    ];

    private $php80Rules = [
        '@PHP80Migration' => true,
    ];

    private $php80RulesRisky = [
        '@PHP80Migration:risky' => true,
    ];

    private $php81Rules = [
        '@PHP81Migration' => true,
    ];

    private $php82Rules = [
        '@PHP82Migration' => true,
    ];

    private $php83Rules = [
        '@PHP83Migration' => true,
    ];

    private $phpUnit56Rules = [
        '@PHPUnit56Migration:risky' => true,
    ];

    private $phpUnit57Rules = [
        '@PHPUnit57Migration:risky' => true,
    ];

    private $phpUnit60Rules = [
        '@PHPUnit60Migration:risky' => true,
    ];

    private $phpUnit75Rules = [
        '@PHPUnit75Migration:risky' => true,
    ];

    private $phpUnit84Rules = [
        '@PHPUnit84Migration:risky' => true,
    ];

    private $phpUnit100Rules = [
        '@PHPUnit100Migration:risky' => true,
    ];

    private $includeRisky = false;
    private $includePhp56 = false;
    private $includePhp70 = false;
    private $includePhp71 = false;
    private $includePhp73 = false;
    private $includePhp74 = false;
    private $includePhp80 = false;
    private $includePhp81 = false;
    private $includePhp82 = false;
    private $includePhp83 = false;
    private $includePhpUnit56 = false;
    private $includePhpUnit57 = false;
    private $includePhpUnit60 = false;
    private $includePhpUnit75 = false;
    private $includePhpUnit84 = false;
    private $includePhpUnit100 = false;

    /**
     * Create Rules.
     *
     * @return static
     */
    public static function create(): self
    {
        return new static();
    }

    /**
     * Include Camelot's risky rules.
     *
     * @return $this
     */
    public function risky(): self
    {
        $this->includeRisky = true;

        return $this;
    }

    public function isRisky(): bool
    {
        return $this->includeRisky;
    }

    /**
     * Include PHP 5.6 rules.
     *
     * @return $this
     */
    public function php56(): self
    {
        $this->includePhp56 = true;

        return $this;
    }

    /**
     * Include PHP 7.0 (and below) rules.
     *
     * @return $this
     */
    public function php70(): self
    {
        $this->php56();
        $this->includePhp70 = true;

        return $this;
    }

    /**
     * Include PHP 7.1 (and below) rules.
     *
     * @return $this
     */
    public function php71(): self
    {
        $this->php70();
        $this->includePhp71 = true;

        return $this;
    }

    /**
     * Include PHP 7.3 (and below) rules.
     *
     * @return $this
     */
    public function php73(): self
    {
        $this->php71();
        $this->includePhp73 = true;

        return $this;
    }

    /**
     * Include PHP 7.4 (and below) rules.
     *
     * @return $this
     */
    public function php74(): self
    {
        $this->php73();
        $this->includePhp74 = true;

        return $this;
    }

    /**
     * Include PHP 8.0 (and below) rules.
     *
     * @return $this
     */
    public function php80(): self
    {
        $this->php74();
        $this->includePhp80 = true;

        return $this;
    }

    /**
     * Include PHP 8.1 (and below) rules.
     *
     * @return $this
     */
    public function php81(): self
    {
        $this->php80();
        $this->includePhp81 = true;

        return $this;
    }

    /**
     * Include PHP 8.2 (and below) rules.
     *
     * @return $this
     */
    public function php82(): self
    {
        $this->php81();
        $this->includePhp82 = true;

        return $this;
    }

    /**
     * Include PHP 8.3 (and below) rules.
     *
     * @return $this
     */
    public function php83(): self
    {
        $this->php82();
        $this->includePhp82 = true;

        return $this;
    }

    /**
     * Include PHPUnit 5.6 rules.
     *
     * @return $this
     */
    public function phpUnit56(): self
    {
        $this->includePhpUnit56 = true;

        return $this;
    }

    /**
     * Include PHPUnit 5.7 rules.
     *
     * @return $this
     */
    public function phpUnit57(): self
    {
        $this->phpUnit56();
        $this->includePhpUnit57 = true;

        return $this;
    }

    /**
     * Include PHPUnit 6.0 rules.
     *
     * @return $this
     */
    public function phpUnit60(): self
    {
        $this->phpUnit57();
        $this->includePhpUnit60 = true;

        return $this;
    }

    /**
     * Include PHPUnit 7.5 rules.
     *
     * @return $this
     */
    public function phpUnit75(): self
    {
        $this->phpUnit60();
        $this->includePhpUnit75 = true;

        return $this;
    }

    /**
     * Include PHPUnit 8.4 rules.
     *
     * @return $this
     */
    public function phpUnit84(): self
    {
        $this->phpUnit75();
        $this->includePhpUnit84 = true;

        return $this;
    }

    /**
     * Include PHPUnit 10.0 rules.
     *
     * @return $this
     */
    public function phpUnit100(): self
    {
        $this->phpUnit84();
        $this->includePhpUnit100 = true;

        return $this;
    }

    public function getIterator()
    {
        $rules = $this->rules;

        if ($this->includePhp70) {
            $rules += $this->php70Rules;
        }
        if ($this->includePhp71) {
            $rules += $this->php71Rules;
        }
        if ($this->includePhp73) {
            $rules += $this->php73Rules;
        }
        if ($this->includePhp74) {
            $rules += $this->php74Rules;
        }
        if ($this->includePhp80) {
            $rules += $this->php80Rules;
        }
        if ($this->includePhp81) {
            $rules += $this->php81Rules;
        }
        if ($this->includePhp82) {
            $rules += $this->php82Rules;
        }
        if ($this->includePhp83) {
            $rules += $this->php83Rules;
        }

        if ($this->includePhpUnit56) {
            $rules += $this->phpUnit56Rules;
        }
        if ($this->includePhpUnit57) {
            $rules += $this->phpUnit57Rules;
        }
        if ($this->includePhpUnit60) {
            $rules += $this->phpUnit60Rules;
        }
        if ($this->includePhpUnit75) {
            $rules += $this->phpUnit75Rules;
        }
        if ($this->includePhpUnit84) {
            $rules += $this->phpUnit84Rules;
        }
        if ($this->includePhpUnit100) {
            $rules += $this->phpUnit100Rules;
        }

        if ($this->includeRisky) {
            $rules += $this->riskyRules;

            if ($this->includePhp70) {
                $rules += $this->php70RulesRisky;
            }
            if ($this->includePhp71) {
                $rules += $this->php71RulesRisky;
            }
            if ($this->includePhp74) {
                $rules += $this->php74RulesRisky;
            }
            if ($this->includePhp80) {
                $rules += $this->php80RulesRisky;
            }
        }

        return new \ArrayIterator($rules);
    }
}
