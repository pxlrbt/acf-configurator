<?php

namespace pxlrbt\AcfConfigurator\Location;

use InvalidArgumentException;
use pxlrbt\AcfConfigurator\Component;

class Location extends Component
{
	protected $param;
	protected $operator;
    protected $value;

    // Param constants for autocompletion
    public const PARAM_POST_TYPE = 'post_type';
    public const PARAM_POST_TEMPLATE = 'post_template';
    public const PARAM_POST_STATUS = 'post_status';
    public const PARAM_POST_FORMAT = 'post_format';
    public const PARAM_POST_CATEGORY = 'post_category';
    public const PARAM_POST_TAXONOMY = 'post_taxonomy';
    public const PARAM_POST = 'post';
    public const PARAM_PAGE_TEMPLATE = 'page_template';
    public const PARAM_PAGE_TYPE = 'page_type';
    public const PARAM_PAGE_PARENT = 'page_parent';
    public const PARAM_PAGE = 'page';
    public const PARAM_CURRENT_USER = 'current_user';
    public const PARAM_CURRENT_USER_ROLE = 'current_user_role';
    public const PARAM_USER_FORM = 'user_form';
    public const PARAM_USER_ROLE = 'user_role';
    public const PARAM_TAXONOMY = 'taxonomy';
    public const PARAM_ATTACHMENT = 'attachment';
    public const PARAM_COMMENT = 'comment';
    public const PARAM_WIDGET = 'widget';
    public const PARAM_NAV_MENU = 'nav_menu';
    public const PARAM_NAV_MENU_ITEM = 'nav_menu_item';
    public const PARAM_OPTIONS_PAGE = 'options_page';

    // Operator constants for autocompletion
    public const OPERATOR_EQUALS = '==';
    public const OPERATOR_NOT_EQUALS = '!=';
    public const OPERATOR_NOT_EMPTY = '!=empty';
    public const OPERATOR_EMPTY = '==empty';
    public const OPERATOR_PATTERN = '==pattern';
    public const OPERATOR_CONTAINS = '==contains';

    /**
     * Create a new location rule
     *
     * @param string $param Param to compare with
     * @param string $operator Operator for comparision
     * @param string $value Value for comparision
     */
    public function __construct($param, $operator, $value)
    {
        $this->param = $param;
        $this->operator($operator);
        $this->value($value);
    }

    /**
     * Set location operator
     *
     * @param string $operator
     * @return Location this
     */
    public function operator(string $operator)
    {
        if (!in_array($operator, ['==', '!=', '!=empty', '==empty', '==pattern', '==contains'])) {
            throw new InvalidArgumentException('Operator must be one of ==, !=, !=empty, ==empty, ==pattern, ==contains');
        }

        $this->operator = $operator;
        return $this;
    }

    /**
     * Set Location value
     *
     * @param string $value
     * @return Location this
     */
    public function value($value)
    {
        $this->value = $value;
        return $this;
    }
}
