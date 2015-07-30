<?php

/**
 * A custom rule for showing / hiding an EditableFormField
 * based the value of another EditableFormField.
 *
 * @package userforms
 */
class EditableCustomRule extends DataObject {

	private static $condition_options = array(
		"IsBlank" => "Is blank",
		"IsNotBlank" => "Is not blank",
		"HasValue" => "Equals",
		"ValueNot" => "Doesn't equal",
		"ValueLessThan" => "Less than",
		"ValueLessThanEqual" => "Less than or equal",
		"ValueGreaterThan" => "Greater than",
		"ValueGreaterThanEqual" => "Greater than or equal"
	);

	private static $db = array(
		'Display' => 'Enum("Show,Hide")',
		'ConditionOption' => 'Enum("IsBlank,IsNotBlank,HasValue,ValueNot,ValueLessThan,ValueLessThanEqual,ValueGreaterThan,ValueGreaterThanEqual")',
		'FieldValue' => 'Varchar'
	);

	private static $has_one = array(
		'Parent' => 'EditableFormField',
		'ConditionField' => 'EditableFormField'
	);

	/**
	 * Built in extensions required
	 *
	 * @config
	 * @var array
	 */
	private static $extensions = array(
		"Versioned('Stage', 'Live')"
	);
}
