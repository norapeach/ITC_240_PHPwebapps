<?php
/****** contains Field Class & Fields Class ******/

class Field { // blueprint for unique Field objects

    private $name; # property to model form field label
    private $message = ''; # may store error message
    private $hasError = false; # boolean tracker used by Validatior

    # constructs a Field object with given name and empty message String
    public function __construct($name, $message = '') {
        $this->name = $name;
        $this->message = $message;
    }

    # getter methods - access Field property values
    public function getName() { return $this->name; } # the Field label
    public function getMessage() { return $this->message; } # any message
    public function hasError()    { return $this->hasError; } # boolean used in Validator

    # mutator - sets $message to given error message & changes error boolean
    public function setErrorMessage($message) { 
        $this->message = $message;
        $this->hasError = true;
    }

    # mutator - sets $message to blank & changes $hasError to false
    public function clearErrorMessage() {
        $this->message = '';
        $this->hasError = false;
    }

    # returns error message with valid HTML tags & may modify css
    public function getHTML() {
        $message = htmlspecialchars($this->message);
        if ($this->hasError()) { 
            # add error class for css to <span> next to input text field
            return '<span class="error">' . $message . '</span>';
        } else {
            # if no error, adds <span> without .error format, $message should = ''
            return '<span>' . $message . '</span>';
        }
    }

} ////// END CLASS

class Fields { # blueprint for a Fields object (type array)
    private $fields = array();

    # accessor function that instantializes a Field and adds it to the Fields assoc. array of objects
    public function addField($name, $message = '') { # passed parameters needed for Field object
        $field = new Field($name, $message); # construct new field
        $this->fields[$field->getName()] = $field;
        /* accesses Field.name value via getName() and sets this as index key in Fields associative array; value is the Field input text; see getField() below  */
    }

    public function getField($name) {
        return $this->fields[$name]; 
    } # gets the Field in the Fields assoc. array object via the $name key & returns its value

    public function hasErrors() { # loops through Fields array & checks each Field object for errors
        foreach ($this->fields as $field) {
            if ($field->hasError()) { return true; }
        }
        return false;
    } # called by controller index.php in if condition to determine if success.php can be displayed (false) or not (if true)
} ////// END FIELDS CLASS
?>
