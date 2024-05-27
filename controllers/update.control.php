<?php 

    class UpdateControl extends Update {
        use Rebounds;
        use Validators;

        // Properties
        private $formFields;

        // Methods
        public function __construct($formFields) {
            $this->formFields = $formFields;
        }

        public function verifyEdit() {
            if ($this->formFields['firstname']) {
                // Check for username requirements
                if (!preg_match("/^[a-zA-ZÀ-ÿ\s'.]*$/", $this->formFields['firstname'])) {
                    $_SESSION['error'] = 'Names can only contain:<br>
                    ● Letters and spaces<br>
                    ● Punctuation marks.';
                    $this->reboundPath('location: ../council.php');
                }
            }
            elseif ($this->formFields['lastname']) {
                // Check for username requirements
                if (!preg_match("/^[a-zA-ZÀ-ÿ\s'.]*$/", $this->formFields['lastname'])) {
                    $_SESSION['error'] = 'Names can only contain:<br>
                    ● Letters and spaces<br>
                    ● Punctuation marks.';
                    $this->reboundPath('location: ../council.php');
                }
            }
            elseif ($this->formFields['username']) {
                // Check for username requirements
                if (!preg_match("/^[a-zA-Z0-9_\-\.]*$/", $this->formFields['username'])) {
                    $_SESSION['error'] = 'Usernames may contain:<br> 
                    ● Letters ● Numbers ● Underscores<br>
                    ● Hyphens ● Periods.';
                    $this->reboundPath('location: ../council.php');
                }
            }
            elseif ($this->formFields['email']) {
                // Check if the field name is 'pwdR' and if it matches exactly with 'pwd'
                if (!filter_var($this->formFields['email'], FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['error'] = 'Please enter a valid email address (e.g., example@example.com)';
                    $this->reboundPath('location: ../council.php');
                }
            }
            elseif (!empty($this->formFields['pwd'])) {
                // Check for password requirements
                if (strlen($this->formFields['pwd']) < 10 || 
                    !preg_match('/[a-z]/', $this->formFields['pwd']) ||
                    !preg_match('/[A-Z]/', $this->formFields['pwd']) || 
                    !preg_match('/[0-9]/', $this->formFields['pwd']) ||
                    !preg_match('/[\W_]/', $this->formFields['pwd'])) {

                    $_SESSION['error'] = 'Password must be:<br>
                    ● Atleast 10 characters in length or more<br>
                    ● Have Uppercase and lowercase letters<br>
                    ● Have Numbers and special characters.';
                    $this->reboundPath('location: ../council.php');
                }
            }
            $this->updateMember($this->formFields);
            exit();
        }
    }