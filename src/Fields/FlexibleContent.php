<?php

namespace pxlrbt\AcfConfigurator;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Layout;



class FlexibleContent extends Field
{
    public const LAYOUT_TABLE = 'table';
    public const LAYOUT_BLOCK = 'block';
    public const LAYOUT_ROW = 'row';

    /**
     * Field type
     *
     * @var string
     */
    protected $type = 'flexible_content';


    protected $layouts = [];

    /**
     * Minimum amount of items to add
     *
     * @var integer
     */
    protected $min;

    /**
     * Maximum amount of items to add
     *
     * @var integer
     */
    protected $max;

    /**
     * Add row button text
     *
     * @var string
     */
    protected $button_label;

    /**
     * Override field construction method to add default button label but run parent constructor after that
     *
     * @param string $label Field label.
     * @param string $key   Field key.
     * @param string $name  Field name.
     */
    public function __construct($name, $label)
    {
        $this->buttonLabel(__( 'Add Row', 'acf'));
        parent::__construct($name, $label);
    }

    /**
     * Set maximum amount of layouts
     *
     * @param integer $max Maximum amount.
     * @return self
     */
    public function max(int $value)
    {
        $this->max = $value;
        return $this;
    }

    /**
     * Set minimum amount of layouts
     *
     * @param integer $min Minimum amount.
     * @return self
     */
    public function min(int $value)
    {
        $this->min = $value;
        return $this;
    }

    /**
     * Set add row button label
     *
     * @param string $button_label Text to show inside button.
     * @return self
     */
    public function buttonLabel(string $value)
    {
        $this->button_label = $value;
        return $this;
    }


    public function layouts(array $layouts)
    {
        foreach ($layouts as $layout) {
            $this->layout($layout);
        }

        return $this;
    }

    public function layout(Layout $layout)
    {
        $this->layouts[] = $layout;
    }
}
