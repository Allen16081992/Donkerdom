<?php // Dhr. Allen Pieter

    class LoginControl extends Login {
        use Rebounds;
        use Validators;

        // Properties
        private $formFields;

        // Methods
        public function __construct($formFields) {
            $this->formFields = $formFields;
        }

        public function verifyLogin() {
            if($this->emptyCheck()) {
                // Empty input, no values given for account.
                $_SESSION['error'] = 'No '.$this->emptyCheck().' provided.';
                $this->reboundAssigner();
            }
            if($this->invalidCheck()) {
                // Empty input, no values given for account.
                $_SESSION['error'] = ''.$this->invalidCheck().'';
                $this->reboundAssigner();
            }
            $this->getMember($this->formFields);
        }
    }