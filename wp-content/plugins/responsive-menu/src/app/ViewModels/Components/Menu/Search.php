<?php

namespace ResponsiveMenu\ViewModels\Components\Menu;
use ResponsiveMenu\ViewModels\Components\ViewComponent;
use ResponsiveMenu\Collections\OptionsCollection;
use ResponsiveMenu\Translation\Translator;

class Search implements ViewComponent {

  public function __construct(Translator $translator) {
    $this->translator = $translator;
  }

  public function render(OptionsCollection $options) {

      return '<div id="responsive-menu-search-box">
        <form action="'.$this->translator->searchUrl().'" class="responsive-menu-search-form" id="responsiveSearch" role="search">
          <input type="search" name="s" placeholder="' . __('SEARCH NEVANTA', 'responsive-menu') . '" class="responsive-menu-search-box">
          <span class="">
              <button class="btn btn-default" type="submit"><img src="'. get_template_directory_uri().'/img/search-icon.png" class="img-res"/></button>
          </span>
        </form>
      </div>';

  }

}