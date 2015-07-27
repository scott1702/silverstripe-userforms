<?php

/**
 * A custom rule for showing / hiding an EditableFormField
 * based the value of another EditableFormField.
 *
 * @package userforms
 */
class EditableCustomRule extends DataObject {

	private static $condition_options = array(
		'IsBlank',
		'IsNotBlank',
		'HasValue',
		'ValueNot',
		'ValueLessThan',
		'ValueLessThanEqual',
		'ValueGreaterThan',
		'ValueGreaterThanEqual'
	);

	private static $db = array(
		'Display' => 'Enum("Show, Hide")',
		'ConditionFieldID' => 'Int',
		'ConditionOption' => 'Varchar',
		'FieldValue' => 'Varchar'
	);

	private static $has_one = array(
		'Parent' => 'EditableFormField'
	);
}
