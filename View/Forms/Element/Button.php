<?php
/**
 * Button
 *
 * @author Flavio Kleiber
 * @copyright (c) 2016-2017, Flavio Kleiber
 */

namespace Solaria\Framework\View\Forms\Element;

use Solaria\Framework\View\Forms\Element\ElementInterface;

class Select implements ElementInterface {

  private $type;
  private $name;
  private $options;

  public function __construct($name='', $type='submit' ,$options = array()) {
    $this->type = $type;
    $this->name = $name;
    $this->options = $options;
  }

  /**
  * @Override
  */
  public function render() {

    //Open tag
    $inputStr = '<button ';

    //Check now the options
    $inputStr = $inputStr.(array_key_exists('class', $this->options)        ? 'class = "'.$this->options['class'].'" '             : 'class = "" ');
    $inputStr = $inputStr.(array_key_exists('id', $this->options)           ? 'id = "'.$this->options['id'].'" '                   : 'id = "" ');

    //echo it now
    echo $inputStr.'>';

    //Name of the button
    echo $this->name;

    //close Tag
    echo "</button>";
    return;

  }
}
