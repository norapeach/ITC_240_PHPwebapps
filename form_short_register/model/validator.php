<?php 
/****** contains Validator Class ******/
class Validator {
    private $fields; # will store the Fields assoc. array that will contain Field objects
    
    # construct Validator instance with $fields containing an empty Fields array instance
    public function __construct() {
        $this->fields = new Fields(); # allows for Fields 'knowlegdge' to be accessed by Validator
    }
    # accessor
    public function getFields() { 
        return $this->fields; # the array of Field objects
    }

    /// Validate a generic text field based on passed attributes of <input> text field
    public function text($name, $value, $required = true, $min = 1, $max = 255) {
        # required set to true as default

        // access Field object in Fields array via index key passed to getField()
        $field = $this->fields->getField($name); 

        // If field is not required and empty, call Field function to clear $message to ''
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        // Check field and set or clear error message
        if ($required && empty($value)) {
            $field->setErrorMessage('Required.');
        } else if (strlen($value) < $min) { # $value must be >= 1 e.g. $min
            $field->setErrorMessage('Too short.');
        } else if (strlen($value) > $max) { # $value length must be <= $max 255 chars
            $field->setErrorMessage('Too long.');
        } else {
            $field->clearErrorMessage();
        }
    }

    // function to check a field against a generic pattern (regex)
    public function pattern($name, $value, $pattern, $message,
            $required = true) {
        
        #Get Field object
        $field = $this->fields->getField($name);

        # If field is not required and empty, remove errors and exit function
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        # Check field $value against regex $patten and set or clear error message
        $match = preg_match($pattern, $value);
        if ($match === false) {
            $field->setErrorMessage('Error testing field.');
        } else if ( $match != 1 ) {
            $field->setErrorMessage($message);
        } else {
            $field->clearErrorMessage();
        }
    }

    ///// Validate phone field
    public function phone($name, $value, $required = false) {
        $field = $this->fields->getField($name); # get the field by its label

        # Call the text method and exit if it yields an error
        $this->text($name, $value, $required);
        if ($field->hasError()) { return; } # returns true if error

        
        #regex ^startswith 3 digits- 3 digits- must $end with 4 digits
        $pattern = '/^[[:digit:]]{3}-[[:digit:]]{3}-[[:digit:]]{4}$/';
        $message = 'Invalid phone number.'; # error message if no match
        $this->pattern($name, $value, $pattern, $message, $required); # call to pattern() defined above passed $pattern regex
        
    }

    ///// Validate email
    public function email($name, $value, $required = true) {
        $field = $this->fields->getField($name); # get Field with key $name

        # If field is not required and empty, remove errors and exit
        if (!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        # Call the text method and exit if it yields an error
        $this->text($name, $value, $required);
        if ($field->hasError()) { return; }

        # Split email address on @ sign and check parts
        $parts = explode('@', $value);
        if (count($parts) < 2) {
            $field->setErrorMessage('At sign required.');
            return;
        }
        if (count($parts) > 2) {
            $field->setErrorMessage('Only one at sign allowed.');
            return;
        }
        $local = $parts[0];
        $domain = $parts[1];

        # Check lengths of local and domain parts
        if (strlen($local) > 64) {
            $field->setErrorMessage('Username part too long.');
            return;
        }
        if (strlen($domain) > 255) {
            $field->setErrorMessage('Domain name part too long.');
            return;
        }

        # Patterns for address formatted local part
        $atom = '[[:alnum:]_!#$%&\'*+\/=?^`{|}~-]+';
        $dotatom = '(\.' . $atom . ')*';
        $address = '(^' . $atom . $dotatom . '$)';

        # patterns for quoted text formatted local part
        $char = '([^\\\\"])';
        $esc  = '(\\\\[\\\\"])';
        $text = '(' . $char . '|' . $esc . ')+';
        $quoted = '(^"' . $text . '"$)';

        # Combined pattern for testing local part
        $localPattern = '/' . $address . '|' . $quoted . '/';

        # Call the pattern method and exit if it yields an error
        $this->pattern($name, $local, $localPattern,
                'Invalid username part.');
        if ($field->hasError()) { return; }

        # regex pattern for domain part
        $hostname = '([[:alnum:]]([-[:alnum:]]{0,62}[[:alnum:]])?)';
        $hostnames = '(' . $hostname . '(\.' . $hostname . ')*)';
        $top = '\.[[:alnum:]]{2,6}';
        $domainPattern = '/^' . $hostnames . $top . '$/';

        # Call the pattern method on $domain
        $this->pattern($name, $domain, $domainPattern,
                'Invalid domain name part.');
    }
}