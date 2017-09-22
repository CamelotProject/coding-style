<?php

namespace Camelot\Tests\Files;

use Camelot\Tests\AbstractSniffTestCase;

class SideEffectsUnitTest extends AbstractSniffTestCase
{
    protected function getWarningList($filename = null)
    {
        return [
            7 => 1,
        ];
    }
}
