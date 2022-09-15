<?php
/**
 * Abstract Hook
 *
 * @package formit2pdf
 * @subpackage snippet
 */

namespace TreehillStudio\FormIt2PDF\Snippets;

use fiHooks;
use modX;
use siHooks;

/**
 * Class Hook
 */
abstract class Hook extends Snippet
{
    /**
     * A reference to the fiHooks instance
     * @var fiHooks|siHooks $hook
     */
    protected $hook;

    /**
     * The optional property prefix for snippet properties
     * @var string $propertyPrefix
     */
    protected $propertyPrefix = 'pdf';

    /**
     * Creates a new Hook instance.
     *
     * @param modX $modx
     * @param fiHooks|siHooks $hook
     * @param array $properties
     */
    public function __construct(modX $modx, $hook, $properties = [])
    {
        $this->hook = &$hook;

        parent::__construct($modx, $properties);
    }
}
