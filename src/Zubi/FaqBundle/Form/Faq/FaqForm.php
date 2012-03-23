<?php
namespace Zubi\FaqBundle\Form\Faq; 

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FaqForm extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
          $builder -> add('tresc', 'text' );
          $builder -> add('odpowiedz', 'textarea');
          $builder -> add('id_statusu', 'text');
    }
    
    public function getName() {
        return 'faqform';
    }
}

?>
