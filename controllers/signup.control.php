<?php 

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
                $this->reboundPath('location: ../signup.php');
            }
            if($this->invalidCheck()) {
                // Empty input, no values given for account.
                $_SESSION['error'] = ''.$this->invalidCheck().'';
                $this->reboundPath('location: ../signup.php');
            }
            $this->verifyMember($this->formFields);
        }
    }