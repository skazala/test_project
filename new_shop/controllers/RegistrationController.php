<?php
class RegistrationController extends Controller {

    public function process($params) {
        //HTML header
        $this->head['title'] = 'Registration page';

        // Was the form submitted?
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->data['name'] = $_POST['name'];
            $this->data['surname'] = $_POST['surname'];
            $this->data['email'] = $_POST['email'];
            $this->data['address'] = $_POST['address'];
            $this->data['phone'] = $_POST['phone'];
            $this->data['card_type'] = $_POST['card_type'];

            // Grabbing the data
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $card_type = $_POST['card_type'];
        
            // Running error handlers and customer registration
            $errors = $this->getErrors($name, $surname, $email, $address, $phone);
            if ($errors) {
                echo ('<br /><h2>ERRORS</h2>');
                print_r($errors);
            } else {
                $customer = new Customer($name, $surname, $email, $address, $phone);
                $customer->setCustomer();
                
                $loyalty_card = new LoyaltyCard($card_type);
                $loyalty_card->setLoyaltyCard();

                $this->addMessage('Registration was successful!');
                $this->redirect('new_shop/registration');
            }
        } else { 
            // form was not submitted, displays empty form
            $this->data['name'] = '';
            $this->data['surname'] = '';
            $this->data['email'] = '';
            $this->data['address'] = '';
            $this->data['phone'] = '';
            $this->data['card_type'] = '';
        }
        
        //Sets the template
        $this->view = 'registration';
    }
    
    // Error hadlers here
    private function isBlank($value) {
        return !isset($value) || trim($value) === '';
    }

    private function hasLengthGreaterThan($value, $min) {
        $length = strlen(trim($value));
        return $length > $min;
    }
    
    private function hasLengthLessThan($value, $max) {
        $length = strlen($value);
        return $length < $max;
    }
    
    private function hasLength($value, $options) {
        if(isset($options['min']) && !$this->hasLengthGreaterThan($value, $options['min'] - 1)) {
          return false;
        } elseif(isset($options['max']) && !$this->hasLengthLessThan($value, $options['max'] + 1)) {
          return false;
        } else {
          return true;
        }
    }
    
    private function validEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function getErrors($name, $surname, $email, $address, $phone) {
        $errors = [];
        //name
        if($this->isBlank($name)) {
            $errors[] = "Name cannot be blank.";
          } elseif(!$this->hasLength($name, ['min' => 2, 'max' => 255])) {
            $errors[] = "First name must be between 2 and 255 characters.";
          }
        //surname
        if($this->isBlank($surname)) {
            $errors[] = "Surname cannot be blank.";
          } elseif(!$this->hasLength($surname, ['min' => 2, 'max' => 255])) {
            $errors[] = "Surname must be between 2 and 255 characters.";
          }  
        //email
        if($this->isBlank($email)) {
            $errors[] = "E-mail cannot be blank.";
          } elseif (!$this->validEmail($email)) {
            $errors[] = "Use correct e-mail.";
          }
        //address
        if($this->isBlank($address)) {
            $errors[] = "Address cannot be blank.";
          }
        //phone
        if($this->isBlank($phone)) {
            $errors[] = "Phone cannot be blank.";
          } elseif ($phone[0] !== '+'){
            //begins not with +
            $errors[] = "Phone must start with +.";
          } 
        if (preg_match('/[A-Za-z]/', $phone)) {
            $errors[] = "Phone must contain only numbers.";
          } 
        return $errors;
    }
}