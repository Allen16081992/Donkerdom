<?php // Dhr. Allen Pieter

    class SignupControl extends Signup {
        use Rebounds;
        use Validators;

        // Properties
        private $formFields;

        // Methods
        public function __construct($formFields) {
            $this->formFields = $formFields;
        }

        public function verifySignup() {
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
            $this->verifyMember($this->formFields);
        }
    }