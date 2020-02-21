<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\ButtonLabel;
use pxlrbt\AcfConfigurator\Fields\Properties\MinMax;
use pxlrbt\AcfConfigurator\Fields\Properties\SubFields;
use pxlrbt\AcfConfigurator\Fields\Properties\Layouts\SubFields as LayoutSubFields;

use function __;

class Repeater extends Field
{
    use ButtonLabel, MinMax, SubFields, LayoutSubFields;

    protected $type = 'repeater';
    protected $collapsed;

    /**
     * Override field construction method to add default button label but run parent constructor after that
     *
     * @param string $label Field label.
     * @param string $key   Field key.
     * @param string $name  Field name.
     */
    public function __construct(string $label, string $name)
    {
        $this->buttonLabel(__( 'Add Row', 'acf'));
        parent::__construct($label, $name);
    }

    /**
     * Set field whose value is shown when collapsed.
     *
     * @param mixed $field The field object or key to use.
     * @return static
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
}
