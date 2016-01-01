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

use DreadLabs\VantomasWebsite\Event\RegisterCodeSnippetBrush;
use DreadLabs\VantomasWebsite\Event\ContextInterface;

/**
 * SyntaxHighlighterParser
 *
 * Parses to a parameter string for Alex Gorbatchev's SyntaxHighlighter library.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class SyntaxHighlighterParser implements ParameterParserInterface
{

    /**
     * How parameter and value pair is formatted.
     *
     * @const string
     */
    const DEFAULT_PAIR_FORMAT = '%s: %s';

    /**
     * How n parameter value pairs are glued together.
     *
     * @const string
     */
    const PAIR_GLUE = '; ';

    /**
     * The default brush.
     *
     * @const string
     */
    const DEFAULT_BRUSH = 'plain';

    /**
     * @var ContextInterface
     */
    private $eventContext;

    /**
     * Allowed parameter key names.
     *
     * @var array
     */
    private $allowedKeys = [
        // string, default: self::DEFAULT_BRUSH
        'brush',
        // bool, default: true
        'auto-links',
        // string, default: ''
        'class-name',
        // bool, default: false
        'collapse',
        // int+, default: 1
        'first-line',
        // bool, default: true
        'gutter',
        // string|null, default: null
        'highlight',
        // bool, default: false
        'html-script',
        // bool, default: true
        'smart-tabs',
        // int+, default: 4
        'tab-size',
        // bool, default: true
        'toolbar'
    ];

    /**
     * How a parameter value should be formatted.
     *
     * @var array
     */
    private $pairFormats = [
        'highlight' => '%s: [%s]',
    ];

    /**
     * @var array
     */
    private $parameters = [];

    /**
     * @param ContextInterface $eventContext
     */
    public function __construct(ContextInterface $eventContext)
    {
        $this->eventContext = $eventContext;
        $this->eventContext->setNamespace(__CLASS__);
    }

    /**
     * Parse to scalar string from YAML.
     *
     * @param array $parseResult
     *
     * @return string
     */
    public function toStringFromYaml(array $parseResult)
    {
        $this->parameters = $parseResult;

        $this->removeNullValues();
        $this->removeInvalidKeys();
        $this->ensureDefaultBrush();

        $brush = SyntaxHighlighterBrush::fromIdentifierOrAlias($this->parameters['brush']);

        $this->eventContext->dispatch(
            RegisterCodeSnippetBrush::fromBrush($brush)
        );

        $this->formatValues();

        return $this->formatPairs();
    }

    /**
     * Remove null values.
     *
     * SyntaxHighlighter defaults apply.
     *
     * @return void
     */
    private function removeNullValues()
    {
        $this->parameters = array_filter($this->parameters, function ($value) {
            return !is_null($value);
        });
    }

    /**
     * @return void
     */
    private function removeInvalidKeys()
    {
        $this->parameters = array_intersect_key(
            $this->parameters,
            array_flip($this->allowedKeys)
        );
    }

    /**
     * @return void
     */
    private function ensureDefaultBrush()
    {
        if (!isset($this->parameters['brush'])) {
            $this->parameters['brush'] = self::DEFAULT_BRUSH;
        }
    }

    /**
     * Applies formats formatting to values.
     *
     * @return void
     */
    private function formatValues()
    {
        array_walk($this->parameters, function (&$value, $key) {
            $parameterValue = $value;

            if (is_bool($parameterValue)) {
                $parameterValue = var_export($parameterValue, true);
            }

            $formattedValue = sprintf(self::DEFAULT_PAIR_FORMAT, $key, $parameterValue);

            if (isset($this->pairFormats[$key])) {
                $formattedValue = sprintf($this->pairFormats[$key], $key, $parameterValue);
            }

            $value = $formattedValue;
        });
    }

    /**
     * @return string
     */
    private function formatPairs()
    {
        return implode(self::PAIR_GLUE, $this->parameters);
    }
}
