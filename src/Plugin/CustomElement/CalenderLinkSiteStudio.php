<?php

namespace Drupal\calender_link_sitestudio\Plugin\CustomElement;

use Drupal\cohesion_elements\CustomElementPluginBase;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Site Studio element for "Calendar Link".
 *
 * @CustomElement(
 *   id = "calender_link_sitestudio",
 *   label = @Translation("Calendar Link SiteStudio")
 * )
 */
class CalenderLinkSiteStudio extends CustomElementPluginBase {

  use StringTranslationTrait;

  /**
   * This is the number of calendar type support.
   */
  protected const int TOTAL_CALENDER_ITEMS = 5;

  /**
   * {@inheritdoc}
   */
  public function getFields(): array {
    $total_calender_items = [];
    for ($i = 0; $i < self::TOTAL_CALENDER_ITEMS; $i++) {
      $total_calender_items['calender_item_' . $i] = [
        'htmlClass' => 'ssa-grid-col-3',
        'type' => 'select',
        'title' => $this->t('Select Calendar'),
        'nullOption' => TRUE,
        'options' => [
          'ics' => $this->t('Apple'),
          'google' => $this->t('Google'),
          'webOutlook' => $this->t('Outlook'),
          'webOffice' => $this->t('Office'),
          'yahoo' => $this->t('Yahoo'),
        ],
      ];
    }

    return $total_calender_items + [
      'title' => [
        'htmlClass' => 'ssa-grid-col-1',
        'title' => $this->t('Calendar title'),
        'type' => 'textfield',
        'placeholder' => $this->t('Title to be added in calendar'),
        'required' => TRUE,
        'validationMessage' => $this->t('This field is required.'),
      ],
      'start_date' => [
        'title' => $this->t('Calendar start date'),
        'type' => 'textfield',
        'required' => TRUE,
        'placeholder' => $this->t('Start date'),
      ],
      'end_date' => [
        'title' => $this->t('Calendar end date'),
        'type' => 'textfield',
        'required' => TRUE,
        'placeholder' => $this->t('End date'),
      ],
      'full_day' => [
        'type' => 'checkbox',
        'title' => $this->t('Full day'),
        'defaultValue' => FALSE,
      ],
      'description' => [
        'title' => $this->t('Calendar description'),
        'type' => 'textarea',
        'placeholder' => $this->t('Description to be added in calendar'),
      ],
      'location' => [
        'title' => $this->t('Calendar address'),
        'type' => 'textarea',
        'placeholder' => $this->t('Description to be added in calendar'),
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function render($element_settings, $element_markup, $element_class): array {
    return [
      '#theme' => 'calender_link_sitestudio_element',
      '#template' => 'calender-link-sitestudio-element',
      '#elementSettings' => $element_settings,
      '#elementMarkup' => $element_markup,
      '#elementClass' => $element_class,
      '#totalCalenderItems' => self::TOTAL_CALENDER_ITEMS,
    ];
  }

}
