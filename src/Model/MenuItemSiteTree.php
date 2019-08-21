<?php

namespace Fromholdio\SuperLinkerMenus\Model;

use Fromholdio\GlobalAnchors\GlobalAnchors;
use Fromholdio\SuperLinker\Extensions\SiteTreeLink;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldGroup;
use UncleCheese\DisplayLogic\Forms\Wrapper;

class MenuItemSiteTree extends MenuItem
{
    private static $table_name = 'MenuItemSiteTree';

    private static $extensions = [
        SiteTreeLink::class,
        GlobalAnchors::class
    ];

    private static $field_labels = [
        'SiteTree' => 'Target Page'
    ];

    public function getGlobalAnchors()
    {
        return GlobalAnchors::get_anchors();
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        if ($this->getCanHaveChildren()) {
            if ($this->SiteTreeID) {
                if (!$this->SubmenuSiteTreeID) {
                    $this->SubmenuSiteTreeID = $this->SiteTreeID;
                }
            }
        }
        return $fields;
    }
}
