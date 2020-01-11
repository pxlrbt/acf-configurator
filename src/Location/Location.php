<?php

namespace pxlrbt\AcfConfigurator\Location;

use pxlrbt\AcfConfigurator\Traits\ToArray;
use pxlrbt\AcfConfigurator\Traits\ValidateOptions;

class Location
{
    use ToArray, ValidateOptions;

    // Param constants for autocompletion
    public static $PARAM_POST_TYPE = 'post_type';
    public static $PARAM_POST_TEMPLATE = 'post_template';
    public static $PARAM_POST_STATUS = 'post_status';
    public static $PARAM_POST_FORMAT = 'post_format';
    public static $PARAM_POST_CATEGORY = 'post_category';
    public static $PARAM_POST_TAXONOMY = 'post_taxonomy';
    public static $PARAM_POST = 'post';
    public static $PARAM_PAGE_TEMPLATE = 'page_template';
    public static $PARAM_PAGE_TYPE = 'page_type';
    public static $PARAM_PAGE_PARENT = 'page_parent';
    public static $PARAM_PAGE = 'page';
    public static $PARAM_CURRENT_USER = 'current_user';
    public static $PARAM_CURRENT_USER_ROLE = 'current_user_role';
    public static $PARAM_USER_FORM = 'user_form';
    public static $PARAM_USER_ROLE = 'user_role';
    public static $PARAM_TAXONOMY = 'taxonomy';
    public static $PARAM_ATTACHMENT = 'attachment';
    public static $PARAM_COMMENT = 'comment';
    public static $PARAM_WIDGET = 'widget';
    public static $PARAM_NAV_MENU = 'nav_menu';
    public static $PARAM_NAV_MENU_ITEM = 'nav_menu_item';
    public static $PARAM_OPTIONS_PAGE = 'options_page';

    // Operator constants for autocompletion
    public static $OPERATOR_EQUALS = '==';
    public static $OPERATOR_NOT_EQUALS = '!=';
    public static $OPERATOR_NOT_EMPTY = '!=empty';
    public static $OPERATOR_EMPTY = '==empty';
    public static $OPERATOR_PATTERN = '==pattern';
    public static $OPERATOR_CONTAINS = '==contains';

	protected $param;
	protected $operator;
    protected $value;

    /**
     * Create a new location rule
     *
     * @param string $param Param to compare with
     * @param string $operator Operator for comparision
     * @param string $value Value for comparision
     */
    public function __construct(string $param, string $operator, $value)
    {
        $this->param($param);
        $this->operator($operator);
        $this->value($value);
    }

    /**
     * Set location param
     *
     * @param string $operator
     * @return self this
     */
    public function param(string $value) : self
    {
        $validOptions = [
            self::$PARAM_POST_TYPE, self::$PARAM_POST_TEMPLATE, self::$PARAM_POST_STATUS,
            self::$PARAM_POST_FORMAT, self::$PARAM_POST_CATEGORY, self::$PARAM_POST_TAXONOMY,
            self::$PARAM_POST, self::$PARAM_PAGE_TEMPLATE, self::$PARAM_PAGE_TYPE,
            self::$PARAM_PAGE_PARENT, self::$PARAM_PAGE, self::$PARAM_CURRENT_USER,
            self::$PARAM_CURRENT_USER_ROLE, self::$PARAM_USER_FORM, self::$PARAM_USER_ROLE,
            self::$PARAM_TAXONOMY, self::$PARAM_ATTACHMENT, self::$PARAM_COMMENT,
            self::$PARAM_WIDGET, self::$PARAM_NAV_MENU, self::$PARAM_NAV_MENU_ITEM,
            self::$PARAM_OPTIONS_PAGE,
        ];

        $this->validateOptions('param', $value, $validOptions);
        $this->param = $value;
        return $this;
    }

    /**
     * Set location operator
     *
     * @param string $operator
     * @return self this
     */
    public function operator(string $operator) : self
    {
        $validOptions = [
            self::$OPERATOR_CONTAINS, self::$OPERATOR_EMPTY, self::$OPERATOR_EQUALS,
            self::$OPERATOR_NOT_EMPTY, self::$OPERATOR_NOT_EQUALS, self::$OPERATOR_PATTERN
        ];

        $this->validateOptions('operator', $operator, $validOptions);
        $this->operator = $operator;
        return $this;
    }

    /**
     * Set Location value
     *
     * @param string $value
     * @return self this
     */
    public function value($value) : self
    {
        $this->value = $value;
        return $this;
    }
}
