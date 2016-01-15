<?php
function getValue($array, $key, $default = null) {
    return isset($array[$key]) ? $array[$key] : $default;
}

function validateRequired($value) {
    if (!is_string($value)) {
        return !empty($value);
    }
    return mb_strlen($value, 'UTF-8') > 0;
}

function validateString($value) {
    return gettype($value) === 'string';
}

function validateLongerOrEqualString($value, $length) {
    return mb_strlen(strval($value), 'UTF-8') >= $length;
}

function validateNonAlphaNumeric($value) {
    return (bool) preg_match('/[^a-z0-9�-�\s]/i', $value);
}

function displayErrors($errors, $field) {
    $fieldErrors = getValue($errors, $field, []);
    $output = '';

    foreach ($fieldErrors as $value) {
        $output .= sprintf('<p class="error">%s</p>', htmlentities($value));
    }

    return $output;
}

function options($data, $selected) {
    $html = '';

    foreach ($data as $key => $value) {
        $html .= sprintf(
            '<option value="%s" %s>%s</option>',
            $key,
            $key == $selected ? 'selected="selected"' : '',
            $value
        );
    }

    return $html;
}

function checkboxesOrRadios($data, $checked, $name, $type = 'checkbox') {
    $html = '';
    if (!is_array($checked)) {
        $checked = [$checked];
    }

    foreach ($data as $value => $label) {
        $id = $name . '_' . $value;
        $html .= sprintf(
            '<label for="%s"><input type="%s" name="%s" value="%s" id="%1$s" %s>%s</label>',
            $id,
            $type,
            $name,
            $value,
            in_array($value, $checked) ? 'checked="checked"' : '',
            $label
        );
    }

    return $html;
}

