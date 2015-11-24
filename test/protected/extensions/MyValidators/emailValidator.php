<?php
/**
 * Created by PhpStorm.
 * User: edii_shadow
 * Date: 24.11.2015
 * Time: 11:53
 */

class emailValidator extends CValidator
{
    private $patternEmail = "/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/";
    /**
     * Validates the attribute of the object.
     * If there is any error, the error message is added to the object.
     * @param CModel $object the object being validated
     * @param string $attribute the attribute being validated
     */
    protected function validateAttribute($object,$attribute)
    {
        // extract the attribute value from it's model object
        if(empty($object->$attribute)) {
            $this->addError($object, $attribute, 'your field email EMPTY!');
        } else {
            $value = explode(',', $object->$attribute);
            if (is_array($value)) {
                foreach ($value as $email):
                    if (!preg_match($this->patternEmail, trim($email))) $this->addError($object, $attribute, 'your {' . $email . '} email(-s) is wrong!');
                endforeach;
            } else throw new CException('yii', 'Not validate email format!');
        }
    }

    /**
     * Returns the JavaScript needed for performing client-side validation.
     * @param CModel $object the data object being validated
     * @param string $attribute the name of the attribute to be validated.
     * @return string the client-side validation script.
     * @see CActiveForm::enableClientValidation
     */
    public function clientValidateAttribute($object,$attribute)
    {

        // check the strength parameter used in the validation rule of our model
        if ($this->strength == 'weak')
            $pattern = $this->weak_pattern;
        elseif ($this->strength == 'strong')
            $pattern = $this->strong_pattern;

        $condition="!value.match({$pattern})";

        return "
            if(".$condition.") {
                messages.push(".CJSON::encode('your password is too weak, you fool!').");
            }
        ";
    }
}