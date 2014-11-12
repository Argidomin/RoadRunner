<?php

namespace Argidomin\AppBundle\Twig;

use Argidomin\AppBundle\Controller\EmpresaController;

class empresaExtensionTwig extends \Twig_Extension
{
	protected $empresa;

	public function __construct(EmpresaController $empresa)
	{
		$this->empresa = $empresa;
	}

	public function getGlobals() {
        return array(
            'empresa' => $this->empresa
        );
    }

    public function getName()
    {
        return 'empresa';
    }

}
