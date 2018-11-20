<?php

namespace DorsetDigital\Elements\Slider\Models;

use DNADesign\Elemental\Models\BaseElement;
use DorsetDigital\Elements\Slider\Controllers\SliderController;
use DorsetDigital\Elements\Slider\DataObjects\Slide;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\TextField;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class Slider extends BaseElement
{
    private static $singular_name = 'Image Slider';
    private static $plural_name = 'Image Sliders';
    private static $description = 'Image slider block';
    private static $table_name = 'DorsetDigital_Elements_Slider';
    private static $controller_class = SliderController::class;

    private static $db = [
        'SlideDelay' => 'Int',
        'TransitionSpeed' => 'Int',
        'SliderType' => 'Varchar(10)'
    ];

    private static $many_many = [
        'Slides' => Slide::class
    ];

    private static $owns = [
        'Slides'
    ];

    private static $defaults = [
        'SlideDelay' => 3500,
        'TransitionSpeed' => 750,
        'SliderType' => 'fade'
    ];

    public function getType()
    {
        return 'Image Slider Block';
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $grid = GridField::create('Slides', 'Slides', $this->Slides(),
            GridFieldConfig_RelationEditor::create()
                ->addComponent(GridFieldOrderableRows::create()));

        $typeSelect = DropdownField::create('SliderType')
            ->setSource(['fade' => 'Fader', 'slide' => 'Slider']);

        $fields->addFieldsToTab('Root.Main', [
            TextField::create('SlideDelay')
                ->setDescription('Delay between slide changes (ms) - defaults to 3500'),
            TextField::create('TransitionSpeed')
                ->setDescription('Transition speed of slides (ms)'),
            $typeSelect,
            $grid
        ]);
        return $fields;
    }

}