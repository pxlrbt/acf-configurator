<?php

namespace pxlrbt\AcfConfigurator;

use InvalidArgumentException;
use pxlrbt\AcfConfigurator\Location\Builder;
use pxlrbt\AcfConfigurator\Traits\ValidateOptions;

use function add_action;
use function acf_add_local_field_group;

class Group extends Component
{
    use ValidateOptions;

    // Position constants
    public static $POSITION_AFTER_TITLE = 'acf_after_title';
    public static $POSITION_NORMAL = 'normal';
    public static $POSITION_SIDE = 'side';

    // Style constants
    public static $STYLE_DEFAULT = 'default';
    public static $STYLE_SEAMLESS = 'seamless';

    // Label placement constants
    public static $LABEL_PLACEMENT_TOP = 'top';
    public static $LABEL_PLACEMENT_LEFT = 'left';

    // Instruction placement constants
    public static $INSTRUCTION_PLACEMENT_LABEL = 'label';
    public static $INSTRUCTION_PLACEMENT_FIELD = 'field';

    // Hide constants
    public static $HIDE_PERMALINK = 'permalink';
    public static $HIDE_EDITOR = 'the_content';
    public static $HIDE_EXCERPT = 'excerpt';
    public static $HIDE_DISCUSSION = 'discussion';
    public static $HIDE_COMMENTS = 'comments';
    public static $HIDE_REVISIONS = 'revisions';
    public static $HIDE_SLUG = 'slug';
    public static $HIDE_AUTHOR = 'author';
    public static $HIDE_FORMAT = 'format';
    public static $HIDE_PAGE_ATTRIBUTES = 'page_attributes';
    public static $HIDE_FEATURED_IMAGE = 'featured_image';
    public static $HIDE_CATEGORIES = 'categories';
    public static $HIDE_TAGS = 'tags';
    public static $HIDE_TRACKBACKS = 'send-trackbacks';

	protected $key;
	protected $title;
	protected $fields = array();
	protected $location = [];
	protected $menu_order = 0;
	protected $position = 'normal';
	protected $style = 'default';
	protected $label_placement = 'top';
	protected $instruction_placement = 'label';
    protected $hide_on_screen = [];


    /**
     * Create a new acf group.
     * Groups register themselfs.
     *
     * @param string $title
     * @param string $name
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function __construct(string $title, string $name)
    {
        $this->title = $title;
        $this->key('group_' . $name);
        add_action('acf/init', [$this, 'register']);
    }

    /**
     * Registers group configuration
     *
     * @return void
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function register()
    {
        acf_add_local_field_group($this->toArray());
    }

    /**
     * Set the groups key.
     * Unique identifier for field group. Must begin with 'group_'
     *
     * @param string $key
     * @return self this
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function key(string $key)
    {
        if (strpos($key, 'group_') === false) {
            throw new InvalidArgumentException('Key must start with "group_"');
        }

        $this->key = $key;
        return $this;
    }

    /**
     * Set groups title
     *
     * @param string $title
     * @return self this
     */
    public function title(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Add location to group.
     * Expects a callbacle which is passed a Location builder.
     *
     * @param callable $callback
     * @return self this
     */
    public function location(callable $callback)
    {
        $builder = new Builder();
        $callback($builder);
        $this->location = $builder->toArray();
        return $this;
    }

    /**
     * Add multiple fields to group
     *
     * @param array $fields
     * @return self this
     */
    public function fields(array $fields)
    {
        foreach ($fields as $field) {
            $this->field($field);
        }

        return $this;
    }

    /**
     * Add a single field to group
     *
     * @param Field $field
     * @return self this
     */
    public function field(Field $field)
    {
        $this->fields[] = $field;
        return $this;
    }

    /**
     * Set group order.
     * Field groups are shown in order from lowest to highest.
     *
     * @param integer $order
     * @return self this
     */
    public function order(int $order)
    {
        $this->menu_order = $order;
        return $this;
    }

    /**
     * Set the position on the edit screen.
     *
     * @param string $position
     * @return self this
     */
    public function position(string $position)
    {
        $this->validateOptions('position', $position, [self::$POSITION_AFTER_TITLE, self::$POSITION_NORMAL, self::$POSITION_SIDE]);
        $this->position = $position;
        return $this;
    }

    /**
     * Set the metabox style.
     *
     * @param string $style
     * @return self this
     */
    public function style(string $style)
    {
        $this->validateOptions('style', $style, [self::$STYLE_DEFAULT, self::$STYLE_SEAMLESS]);
        $this->style = $style;
        return $this;
    }

    /**
     * Set where field labels are places in relation to fields.
     *
     * @param string $placement
     * @return self this
     */
    public function labelPlacement(string $placement)
    {
        $this->validateOptions('labelPlacement', $placement, [self::$LABEL_PLACEMENT_TOP, self::$LABEL_PLACEMENT_LEFT]);
        $this->label_placement = $placement;
        return $this;
    }

    /**
     * Set where field instructions are places in relation to fields.
     *
     * @param string $placement
     * @return self this
     */
    public function instructionPlacement(string $placement)
    {
        $this->validateOptions('instructionPlacement', $placement, [self::$INSTRUCTION_PLACEMENT_FIELD, self::$INSTRUCTION_PLACEMENT_LABEL]);
        $this->instruction_placement = $placement;
        return $this;
    }

    /**
     * Add element which will be hidden from screen
     *
     * @param string $hide
     * @return self this
     */
    public function hide(string $hide)
    {
        $validArguments = [
            self::$HIDE_AUTHOR, self::$HIDE_CATEGORIES, self::$HIDE_COMMENTS,
            self::$HIDE_DISCUSSION, self::$HIDE_EDITOR, self::$HIDE_EXCERPT,
            self::$HIDE_FEATURED_IMAGE, self::$HIDE_FORMAT, self::$HIDE_PAGE_ATTRIBUTES,
            self::$HIDE_PERMALINK, self::$HIDE_REVISIONS, self::$HIDE_SLUG,
            self::$HIDE_TAGS, self::$HIDE_TRACKBACKS
        ];

        $this->validateOptions('hide', $hide, $validArguments);
        $this->hide_on_screen[] = $hide;
        return $this;
    }
}
