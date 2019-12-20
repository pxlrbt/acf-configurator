<?php

namespace pxlrbt\AcfConfigurator;

use InvalidArgumentException;
use pxlrbt\AcfConfigurator\Location\Builder;

use function add_action;
use function acf_add_local_field_group;


class Group extends Component
{
    // Position constants
    public const POSITION_AFTER_TITLE = 'acf_after_title';
    public const POSITION_NORMAL = 'normal';
    public const POSITION_SIDE = 'side';

    // Style constants
    public const STYLE_DEFAULT = 'default';
    public const STYLE_SEAMLESS = 'seamless';

    // Label placement constants
    public const LABEL_PLACEMENT_TOP = 'top';
    public const LABEL_PLACEMENT_LEFT = 'left';

    // Instruction placement constants
    public const INSTRUCTION_PLACEMENT_LABEL = 'label';
    public const INSTRUCTION_PLACEMENT_FIELD = 'field';

    // Hide constants
    public const HIDE_PERMALINK = 'permalink';
    public const HIDE_EDITOR = 'the_content';
    public const HIDE_EXCERPT = 'excerpt';
    public const HIDE_DISCUSSION = 'discussion';
    public const HIDE_COMMENTS = 'comments';
    public const HIDE_REVISIONS = 'revisions';
    public const HIDE_SLUG = 'slug';
    public const HIDE_AUTHOR = 'author';
    public const HIDE_FORMAT = 'format';
    public const HIDE_PAGE_ATTRIBUTES = 'page_attributes';
    public const HIDE_FEATURED_IMAGE = 'featured_image';
    public const HIDE_CATEGORIES = 'categories';
    public const HIDE_TAGS = 'tags';
    public const HIDE_TRACKBACKS = 'send-trackbacks';

    /* (string) Unique identifier for field group. Must begin with 'group_' */
	protected $key = 'group_1';

	/* (string) Visible in metabox handle */
	protected $title = 'My Group';

	/* (array) An array of fields */
	protected $fields = array();

	/* (array) An array containing 'rule groups' where each 'rule group' is an array containing 'rules'.
	Each group is considered an 'or', and each rule is considered an 'and'. */
	protected $location = [];

	/* (int) Field groups are shown in order from lowest to highest. Defaults to 0 */
	protected $menu_order = 0;

	/* (string) Determines the position on the edit screen. Defaults to normal. Choices of 'acf_after_title', 'normal' or 'side' */
	protected $position = self::POSITION_NORMAL;

	/* (string) Determines the metabox style. Defaults to 'default'. Choices of 'default' or 'seamless' */
	protected $style = self::STYLE_DEFAULT;

	/* (string) Determines where field labels are places in relation to fields. Defaults to 'top'.
	Choices of 'top' (Above fields) or 'left' (Beside fields) */
	protected $label_placement = self::LABEL_PLACEMENT_TOP;

	/* (string) Determines where field instructions are places in relation to fields. Defaults to 'label'.
	Choices of 'label' (Below labels) or 'field' (Below fields) */
	protected $instruction_placement = self::INSTRUCTION_PLACEMENT_LABEL;

	/* (array) An array of elements to hide on the screen */
    protected $hide_on_screen = [];


    public function __construct($name, $title)
    {
        $this->title = $title;
        $this->key('field_' . $name);
        add_action('acf/init', [$this, 'register']);
    }

    public function register()
    {
        acf_add_local_field_group($this->toArray());
    }

    /**
     * Set groups key
     *
     * @param string $key
     * @return Group this
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function key(string $key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Set groups title
     *
     * @param string $title
     * @return Group this
     */
    public function title(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Add multiple rule groups
     *
     * @param array Array of LocationGroup
     * @return Group this
     */
    public function location(callable $callback)
    {
        $builder = new Builder();
        $callback($builder);
        $this->location = $builder->toArray();
        return $this;
    }

    /**
     * Add multiple fields
     *
     * @param array $fields
     * @return Group this
     */
    public function fields(array $fields)
    {
        foreach ($fields as $field) {
            $this->field($field);
        }

        return $this;
    }

    /**
     * Add a single field
     *
     * @param Field $field
     * @return Group this
     */
    public function field(Field $field)
    {
        $this->fields[] = $field;
    }

    /**
     * Set group order
     *
     * @param integer $order
     * @return Group this
     */
    public function order(int $order)
    {
        $this->menu_order = $order;
        return $this;
    }

    /**
     * Set group position
     *
     * @param string $position
     * @return Group this
     */
    public function position(string $position)
    {
        if (!in_array($position, ['acf_after_title', 'normal', 'side'])) {
            throw new InvalidArgumentException('Position ' . $position . ' is not supported');
        }

        $this->position = $position;
        return $this;
    }

    /**
     * Set group style
     *
     * @param string $style
     * @return Group this
     */
    public function style(string $style)
    {
        if (!in_array($style, ['default', 'seamless'])) {
            throw new InvalidArgumentException('Style ' . $style . ' is not supported');
        }

        $this->style = $style;
        return $this;
    }

    /**
     * Set groups label placement
     *
     * @param string $placement
     * @return Group this
     */
    public function labelPlacement(string $placement)
    {
        if (!in_array($placement, ['top', 'left'])) {
            throw new InvalidArgumentException('LabelPlacement ' . $placement . ' is not supported');
        }

        $this->label_placement = $placement;
        return $this;
    }

    /**
     * Set groups instruction placement
     *
     * @param string $placement
     * @return Group this
     */
    public function instructionPlacement(string $placement)
    {
        if (!in_array($placement, ['label', 'field'])) {
            throw new InvalidArgumentException('InstructionPlacement ' . $placement . ' is not supported');
        }

        $this->instruction_placement = $placement;
        return $this;
    }

    /**
     * Add hidden element
     *
     * @param string $hide
     * @return Group this
     */
    public function hide(string $hide)
    {
        if (!in_array($hide, ['permalink', 'the_content', 'excerpt', 'discussion', 'comments', 'revisions', 'slug', 'author', 'format', 'page_attributes', 'featured_image', 'categories', 'tags', 'send-trackbacks'])) {
            throw new InvalidArgumentException('Hide ' . $hide . ' is not supported');
        }

        $this->hide_on_screen[] = $hide;
        return $this;
    }
}
