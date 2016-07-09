<?php
namespace Ackintosh;

class Toumi
{
    /**
     * Load only Function|Class Declarations.
     *
     * @param   string|array
     * @return  void
     * @throws  \InvalidArgumentException
     */
    public static function load($paths)
    {
        if (!is_array($paths)) {
            $paths = array($paths);
        }

        foreach ($paths as $p) {
            $source = @file_get_contents($p);
            if ($source === false) {
                throw new \InvalidArgumentException();
            }

            self::filteringAndEval($source);
        }
    }

    /**
     * @param   string  $source
     * @return  void
     */
    private static function filteringAndEval($source)
    {
        $filtered = self::filtering($source);
        eval($filtered);
    }

    /**
     * @param   string  $source
     * @return  string  $filtered
     */
    private static function filtering($source)
    {
        $tokens     = token_get_all($source);
        $filtered   = '';
        $blaceCount = 0;
        $started    = false;
        foreach ($tokens as $t) {

            if (is_array($t)) {
                switch ($t[0]) {
                case T_CLASS:
                case T_FUNCTION:
                    $started = true;
                    $filtered .= "\n" . $t[1];
                    break;
                default:
                    if ($started) {
                        $filtered .= $t[1];
                    }
                    break;
                }
            } else {
                if ($started) {
                    $filtered .= $t;
                }

                if ($t === '{') {
                    $blaceCount++;
                } elseif ($t === '}') {
                    $blaceCount--;
                    if ($blaceCount === 0) {
                        $started = false;
                    }
                }
            }
        }

        return $filtered;
    }
}
