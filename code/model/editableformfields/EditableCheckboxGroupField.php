<?php
/**
 * EditableCheckboxGroup
 *
 * Represents a set of selectable radio buttons
 * 
 * @package userforms
 */

class EditableCheckboxGroupField extends EditableMultipleOptionField {

	private static $singular_name = "Checkbox Group";
	
	private static $plural_name = "Checkbox Groups";
	
	public function getFormField() {
		$optionSet = $this->Options();
		$options = array();

		$optionMap = ($optionSet) ? $optionSet->map('EscapedTitle', 'Title') : array();

		$field = new UserFormsCheckboxSetField($this->Name, $this->Title, $optionMap);

		// Set the default checked items
		$defaultCheckedItems = $optionSet->filter('Default', 1);

		if ($defaultCheckedItems->count()) {
			$field->setDefaultItems($optionSet->filter('Default', 1)->map('EscapedTitle')->keys());
		}

		return $field;
	}
	
	public function getValueFromData($data) {
		$result = '';
		$entries = (isset($data[$this->Name])) ? $data[$this->Name] : false;
		
		if($entries) {
			if(!is_array($data[$this->Name])) {
				$entries = array($data[$this->Name]);
			}
			foreach($entries as $selected => $value) {
				if(!$result) {
					$result = $value;
				} else {
					$result .= ", " . $value;
				}
			}
		}
		return $result;
	}
}