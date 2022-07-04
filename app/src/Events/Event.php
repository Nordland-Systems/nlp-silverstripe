<?php

namespace App\Events;

use SilverStripe\Assets\Image;
use SilverStripe\LinkField\Models\Link;
use SilverStripe\LinkField\Form\LinkField;
use SilverStripe\ORM\DataObject;

/**
 * Class \App\Events\Event
 *
 * @property string $Title
 * @property string $Start
 * @property string $End
 * @property string $Description
 * @property int $ImageID
 * @property int $LinkID
 * @method \SilverStripe\Assets\Image Image()
 * @method \SilverStripe\LinkField\Models\Link Link()
 */
class Event extends DataObject
{
    private static $db = [
        "Title" => "Varchar(255)",
        "Start" => "Datetime",
        "End" => "Datetime",
        "Description" => "HTMLText"
    ];

    private static $has_one = [
        "Image" => Image::class,
        "Link" => Link::class,
    ];

    private static $owns = [
        "Image",
        "Link"
    ];

    private static $default_sort = "Start DESC";

    private static $field_labels = [
        "Title" => "Titel",
        "Start" => "Start",
        "End" => "Ende",
        "Description" => "Kurzbeschreibung",
        "Link" => "Link"
    ];

    private static $summary_fields = [
        "FormattedStartDate" => "Datum",
        "Title" => "Titel",
    ];

    private static $searchable_fields = [
        "Start", "Title", "Description",
    ];

    private static $table_name = "Event";

    private static $singular_name = "Event";
    private static $plural_name = "Events";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("LinkID");
        $fields->insertAfter('Description', LinkField::create('Link'));
        return $fields;
    }


    public function HasStartTime() {
        $formatted = $this->dbObject('Start')->Format("HH:mm");
        return $formatted && $formatted != "00:00";
    }

    public function HasEndTime() {
        $formatted = $this->dbObject('End')->Format("HH:mm");
        return $formatted && $formatted != "00:00";
    }

    public function FormattedStartDate() {
        $date = $this->dbObject('Start');
        if($date)
            return $date->Format("dd.MM.yy (HH:mm)");
    }

    public function FormattedEndDate() {
        $date = $this->dbObject('End');
        if($date)
            return $date->Format("dd.MM.yy (HH:mm)");
    }
}
