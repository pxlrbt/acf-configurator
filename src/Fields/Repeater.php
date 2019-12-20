<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;



class Repeater extends Field
{
    public const LAYOUT_TABLE = 'table';
    public const LAYOUT_BLOCK = 'block';
    public const LAYOUT_ROW = 'row';

    /**
     * Field type
     *
     * @var string
     */
    protected $type = 'repeater';

    /**
     * What sub field should be shown when collapsed
     *
     * @var string Field key
     */
    protected $collapsed;

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
     * Field layout
     *
     * @var string
     */
    protected $layout = self::LAYOUT_TABLE;

    /**
     * Add row button text
     *
     * @var string
     */
    protected $button_label;

    /**
     * Repeater fields
     *
     * @var array
     */
    public $sub_fields = [];

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
     * Set field whose value is shown when collapsed.
     *
     * @param mixed $field The field object or key to use.
     * @return self
     */
    public function collapsed($field)
    {
        if ($field instanceof Field) {
            $this->collapsed = $field->getKey();
        } else {
            $this->collapsed = $field;
        }

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
     * Set layout
     *
     * @throws \Geniem\ACF\Exception Throws error if layout is not valid.
     * @param string $layout New layout.
     * @return self
     */
    public function layout(string $value)
    {
        $this->validateOptions('layout', $value, [self::LAYOUT_BLOCK, self::LAYOUT_ROW, self::LAYOUT_TABLE]);
        $this->layout = $value;
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

    public function fields(array $fields)
    {
        foreach ($fields as $field) {
            $this->field($field);
        }

        return $this;
    }

    public function field(Field $field)
    {
        $this->sub_fields[] = $field;
    }
}
