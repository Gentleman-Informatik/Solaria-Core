<?php
/**
 * Select field
 *
 * @author Flavio Kleiber
 * @copyright (c) 2016-2017, Flavio Kleiber
 */

namespace Solaria\Framework\View\Forms\Element;

use Solaria\Framework\View\Forms\Element\ElementInterface;

class Select implements ElementInterface {

  private $name;
  private $selected;
  private $options;

  public function __construct($name = "", $selected = array() ,$options = array()) {
    $this->name = $name;
    $this->selected = $selected;
    $this->options = $options;
  }

  /**
  * @Override
  */
  public function render() {

    //Open tag
    $inputStr = '<select ';

    //Check now the options
    $inputStr = $inputStr.(array_key_exists('class', $this->options)        ? 'class = "'.$this->options['class'].'" '             : 'class = "" ');
    $inputStr = $inputStr.(array_key_exists('id', $this->options)           ? 'id = "'.$this->options['id'].'" '                   : 'id = "" ');

    //echo it now
    echo $inputStr.'>';

    //Add option tag
    foreach ($this->selected as $key => $value) {
      echo '<option value="'.$value.'">'.$key.'</option>';
    }

    //close Tag
    echo "</select>";
    return;

  }
}
