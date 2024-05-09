<?php // Dhr. Allen Pieter

    class DeleteControl extends Delete {
        // Properties
        private $formFields;
        private $operator;

        // Methods
        public function __construct($formFields) {
            $this->formFields = $formFields;
        }

        public function deleteAccount() {
            // Verify which form the request came from
            if (isset($_POST['undoMember'])) {
                // Management
                $this->operator = 'admin';
            } 
            elseif (isset($_POST['shutAcc'])) {
                // Personal request for account closure
                $this->operator = 'user';
            }
            $this->unsetMember($this->formFields, $this->operator);
        }
    }