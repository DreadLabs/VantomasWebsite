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
 * SyntaxHighlighterBrush
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class SyntaxHighlighterBrush extends AbstractBrush implements BrushInterface
{

    /**
     * Map of brush aliases to brush identifier.
     *
     * @var array
     */
    private static $aliasToIdentifierMap = array(
        'applescript' => 'AppleScript',
        'actionscript3' => 'AS3',
        'bash' => 'Bash',
        'coldfusion' => 'ColdFusion',
        'cpp' => 'Cpp',
        'csharp' => 'CSharp',
        'css' => 'Css',
        'delphi' => 'Delphi',
        'diff' => 'Diff',
        'erlang' => 'Erlang',
        'groovy' => 'Groovy',
        'java' => 'Java',
        'javafx' => 'JavaFX',
        'javascript' => 'JScript',
        'json' => 'JScript',
        'perl' => 'Perl',
        'php' => 'Php',
        'plain' => 'Plain',
        'powershell' => 'PowerShell',
        'python' => 'Python',
        'ruby' => 'Ruby',
        'scala' => 'Scala',
        'sql' => 'Sql',
        'typoscript' => 'Typoscript',
        'ts' => 'Typoscript',
        'vbnet' => 'Vb',
        'xml' => 'Xml',
    );

    /**
     * @param string $alias
     * @param string $identifier
     */
    private function __construct($alias, $identifier)
    {
        $this->alias = $alias;
        $this->identifier = $identifier;
    }

    /**
     * Instantiates the brush by identifier or alias.
     *
     * @param string $identifierOrAlias
     *
     * @return BrushInterface
     */
    public static function fromIdentifierOrAlias($identifierOrAlias)
    {
        $alias = $identifierOrAlias;
        $identifier = 'Plain';

        if (isset(self::$aliasToIdentifierMap[$identifierOrAlias])) {
            $identifier = self::$aliasToIdentifierMap[$identifierOrAlias];
        }

        return new static($alias, $identifier);
    }
}
