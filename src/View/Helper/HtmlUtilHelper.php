<?php
namespace App\View\Helper;

class HtmlUtilHelper extends \Cake\View\Helper
{
    public function buildPagination(\BootstrapUI\View\Helper\PaginatorHelper $paginator)
    {
        if($paginator->numbers())
        {
            $html = '<div class="row">';
            $html .= '<div class="col-md-8">';
            $html .= '<ul class="pagination" style="padding: 0; margin: 0;">';
            $html .= "</li>{$paginator->prev('«')}";
            $html .= "{$paginator->numbers(['after'=>'','before'=>''])}";
            $html .= "{$paginator->next('»')}";
            $html .= '</ul>';
            $html .= '</div>';
            $html .= '<div style="margin-top: 6px;" class="col-md-4 text-right">';
            $html .= $paginator->counter([
                "format" => "{{start}} a {{end}} de {{count}} registros"
            ]);
            $html .= '</div>';
            $html .= '</div>';
            return $html;
        }
       return false;
    }
}