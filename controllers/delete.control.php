<?php // Dhr. Allen Pieter

    class DeleteControl extends Delete {
        // Properties
        private $formFields;

        // Methods
        public function __construct($formFields) {
            $this->formFields = $formFields;
        }

        public function deleteMember() {
            $this->unsetMember($this->formFields);
        }

        public function deleteAccount() {
            $this->eraseMember($this->formFields);
        }
    }