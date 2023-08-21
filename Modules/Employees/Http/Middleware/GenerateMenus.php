<?php

namespace Modules\Employees\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         *
         * Module Menu for Admin Backend
         *
         * *********************************************************************
         */
        \Menu::make('admin_sidebar', function ($menu) {

            // Employees
            $menu->add('<i class="fas fa-people-arrows c-sidebar-nav-icon"></i> '.__('labels.backend.customer.name'), [
                'route' => 'backend.employees.index',
                'class' => "c-sidebar-nav-item",
            ])
                ->data([
                    'order' => 84,
                    'activematches' => ['admin/employees*'],
                    'permission' => ['view_employees'],
                ])
                ->link->attr([
                    'class' => 'c-sidebar-nav-link',
                ]);
        })->sortBy('order');

        return $next($request);
    }
}
