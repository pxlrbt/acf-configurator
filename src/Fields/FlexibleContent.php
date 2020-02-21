<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\ButtonLabel;
use pxlrbt\AcfConfigurator\Fields\Properties\MinMax;
use pxlrbt\AcfConfigurator\Fields\Properties\Layouts\SubFields as LayoutSubFields;
use pxlrbt\AcfConfigurator\Layout;



class FlexibleContent extends Field
{
    use ButtonLabel, MinMax, LayoutSubFields;

    protected $type = 'flexible_content';
    protected $layouts = [];

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
     * Add multiple flexible content layouts
     *
     * @param array $layouts
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     */
    public function addLayouts(array $layouts)
    {
        foreach ($layouts as $layout) {
            $this->addLayout($layout);
        }

        return $this;
    }

    /**
     * Add a flexible content layout.
     *
     * @param Layout $layout
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     */
    public function addLayout(Layout $layout)
    {
        $this->layouts[] = $layout;
        return $this;
    }
}
