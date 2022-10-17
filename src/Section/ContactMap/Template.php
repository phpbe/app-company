<?php

namespace Be\App\Company\Section\ContactMap;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'center'];

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssPadding('contact-map');
        echo $this->getCssMargin('contact-map');

        echo '#' . $this->id . ' .contact-map {';
        echo 'height: 450px;';
        echo '}';

        echo '#' . $this->id . ' .contact-map iframe {';
        echo 'width: 100%;';
        echo 'height: ' . $this->config->height . ';';
        //echo 'filter: brightness( 62% ) contrast( 100% ) saturate( 0% ) blur( 0px ) hue-rotate( 22deg );';
        echo '}';

        echo '</style>';
    }

    public function display()
    {
        if ($this->config->enable) {
            $this->css();

            echo '<div class="contact-map">';
            if ($this->position === 'middle' && $this->config->width === 'default') {
                echo '<div class="be-container">';
            }

            $configCompanyContact = Be::getConfig('App.Company.Contact');
            echo '<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . beUrl('Company.Contact.' . $configCompanyContact->mapType . 'Map') . '"></iframe>';

            if ($this->position === 'middle' && $this->config->width === 'default') {
                echo '</div>';
            }
            echo '</div>';
        }
    }
}

