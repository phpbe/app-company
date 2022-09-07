<?php

namespace Be\App\Company\Section\Team;

use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'center'];

    public array $routes = ['Company.Team.index'];

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssBackgroundColor('team');
        echo $this->getCssPadding('team');
        echo $this->getCssMargin('team');
        echo '</style>';
    }

    public function display()
    {
        if ($this->config->enable) {
            $this->css();

            echo '<div class="team">';

            if ($this->position === 'middle' && $this->config->width === 'default') {
                echo '<div class="be-container">';
            }

            echo $this->page->tag0('be-section-title');
            echo $this->config->title;
            echo $this->page->tag1('be-section-title');

            echo $this->page->tag0('be-section-content');


            echo $this->page->tag1('be-section-content');

            if ($this->position === 'middle' && $this->config->width === 'default') {
                echo '</div>';
            }

            echo '</div>';
        }
    }


}
