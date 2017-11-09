<?php
/**
 * Simple Inputfield
 *
 * @author Flavio Kleiber
 * @copyright (c) 2016-2017, Flavio Kleiber
 */

namespace Solaria\Framework\View\Forms\Element;

use Solaria\Framework\View\Forms\Element\ElementInterface;

class Input implements ElementInterface {

  private $name;
  private $type;
  private $options;

  public function __construct($name = "", $type = "text", $options = array()) {
    $this->name = $name;
    $this->type = $type;
    $this->options = $options;
  }

  /**
  * @Override
  */
  public function render() {

    //Open tag
    $inputStr = '<input type="'.$this->type.'" name="'.$this->name.'" ';

    //Check now the options
    $inputStr = $inputStr.(array_key_exists('class', $this->options)        ? 'class = "'.$this->options['class'].'" '             : 'class = "" ');
    $inputStr = $inputStr.(array_key_exists('id', $this->options)           ? 'id = "'.$this->options['id'].'" '                   : 'id = "" ');
    $inputStr = $inputStr.(array_key_exists('placeholder', $this->options)  ? 'placeholder = "'.$this->options['placeholder'].'" ' : 'placeholder = "" ');

    //Close Tag
    $inputStr = $inputStr.' />';

    //echo it now
    echo $inputStr;
    return;

  }
}
