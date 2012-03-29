<?php
namespace Zubi\FaqBundle\Form\Faq; 

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FaqForm extends AbstractType {

    
    public function buildForm(FormBuilder $builder, array $options) {
          $builder -> add('tresc', 'text' );
          $builder -> add('odpowiedz', 'textarea');
          $builder -> add('StatusWidocznosci', 'entity', array(
                        'class' => 'Zubi\FaqBundle\Entity\Status_widocznosci'
                        //,'property' => 'nazwa'
                    ));
    }
    
    public function getName() {
        return 'faqform';
    }
}

?>
