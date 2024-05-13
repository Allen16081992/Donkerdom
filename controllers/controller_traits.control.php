<?php 
    trait Rebounds {
        private function reboundPath($route) {
            header($route);
            exit();
        }
    }

    trait Validators {
        private function emptyCheck() {
            foreach ($this->formFields as $fieldName => $fieldValue) {
                if ($fieldName === 'login' || $fieldName === 'signup') {
                    continue;
                }
                if (empty($fieldValue)) {
                    return $fieldName; 
                } 
            }
        } 

        private function invalidCheck() {
            foreach ($this->formFields as $fieldName => $fieldValue) {
                if ($fieldName === 'login' || $fieldName === 'signup') {
                    continue;
                }
                if ($fieldName === 'firstname' || $fieldName === 'lastname') {
                    // Check for username requirements
                    if (!preg_match("/^[a-zA-ZÀ-ÿ\s'.]*$/", $fieldValue)) {
                        return "Names can only contain:<br>
                        ● Letters and spaces<br>
                        ● Punctuation marks.";
                    }
                }
                elseif ($fieldName === 'username') {
                    // Check for username requirements
                    if (!preg_match("/^[a-zA-Z0-9_\-\.]*$/", $fieldValue)) {
                        return "Usernames may contain:<br> 
                        ● Letters ● Numbers ● Underscores<br>
                        ● Hyphens ● Periods.";
                    }
                }
                elseif ($fieldName === 'email') {
                    // Check if the field name is 'pwdR' and if it matches exactly with 'pwd'
                    if (!filter_var($fieldValue, FILTER_VALIDATE_EMAIL)) {
                        return "Please enter a valid email address (e.g., example@example.com)";
                    }
                }
                elseif ($fieldName === 'pwd') {
                    // Check for password requirements
                    if (strlen($fieldValue) < 10 || 
                        !preg_match('/[a-z]/', $fieldValue) ||
                        !preg_match('/[A-Z]/', $fieldValue) || 
                        !preg_match('/[0-9]/', $fieldValue) ||
                        !preg_match('/[\W_]/', $fieldValue)) {
                        return "Password must be:<br>
                        ● Atleast 10 characters in length or more<br>
                        ● Have Uppercase and lowercase letters<br>
                        ● Have Numbers and special characters.";
                    }
                }
                elseif ($fieldName === 'pwdR') {
                    // Check if the field name is 'pwdR' and if it matches exactly with 'pwd'
                    if ($fieldValue !== $this->formFields['pwd']) {
                        return "Passwords don't match.";
                    }
                }
            }
        }    
    }