<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\PortfoliosRepository;
use Corp\Portfolio;

class PortfolioController extends SiteController
{
    //
    public function __construct( PortfoliosRepository $p_rep) {
            parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

            $this->p_rep = $p_rep;

            $this->template = env('THEME').'.portfolios';
            
	}
	
	public function index($cat_alias = FALSE) {

		$this->title = 'Портфолио';
		$this->keywords = 'Портфолио';
		$this->meta_desc = 'Портфолио';

		$portfolios = $this->getPortfolios();

        $content = view(env('THEME').'.portfolios_content')->with('portfolios', $portfolios)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();
    }

    public function getPortfolios($take = false, $paginate = true) {
    	$portfolios = $this->p_rep->get('*', $take, $paginate);
    	if($portfolios){
    		$portfolios->load('filter');
    	}
    	return $portfolios;
    }

    public function show($alias) {
    
    	$portfolio = $this->p_rep->one($alias);
    	
        $portfolios = $this->getPortfolios(config('settings.other_portfolios'), false);

        $this->title = $portfolio->title;
        $this->keywords = $portfolio->keywords;
        $this->meta_desc = $portfolio->meta_desc;


        $content = view(env("THEME"). '.portfolio_content', ['portfolio'=>$portfolio, 'portfolios'=>$portfolios])->render();
        $this->vars = array_add($this->vars, 'content', $content);


        return $this->renderOutput();
    }
}
