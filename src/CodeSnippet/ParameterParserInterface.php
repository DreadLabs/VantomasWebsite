<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\CodeSnippet;

/**
 * ParameterParserInterface
 *
 * Syntax highlighting libraries allow different output
 * of parameters, e.g. to add to a HTML class attribute
 * for the underlying JavaScript library to analyze and
 * apply specific functionality (e.g. gutter, collapsible
 * states, line highlighting)
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ParameterParserInterface
{

    /**
     * Parse to scalar string from YAML.
     *
     * @param array $parseResult
     *
     * @return string
     */
    public function toStringFromYaml(array $parseResult);
}
