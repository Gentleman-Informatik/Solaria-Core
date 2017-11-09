<?php
/**
 * A Formulator class
 *
 * @author Flavio Kleiber
 * @copyright (c) 2016-2017, Flavio Kleiber
 */

namespace Solaria\Framework\View\Forms;

use Solaria\Framework\View\Forms\Element\ElementInterface;
use Exception;

class Form {

  private $elements = array();
  private $method;
  private $action;

  public function __construct($method = "POST", $action = "") {
    $this->method = $method;
    $this->action = $action;
  }

  public function add($element) {

    if(!$element instanceof ElementInterface) {
        throw new Exception("Try to add a element wich has not implemented interface!");
    }

    //Add element to render var
    $this->elements[] = $element;

  }

  public function render() {

    //Start rendering htlm
    echo '<form method="'.$this->method.'" action="'.$this->action.'">';
    foreach ($this->elements as $element) {
        $element->render();
    }
    echo "</form>";

  }

}
