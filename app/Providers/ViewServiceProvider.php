<?php

namespace App\Providers;
use App\Models\Articulo;
use App\Models\Proveedor;
use App\Models\Marca;
use App\Models\TipoArticulo;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['compras.fields'], function ($view) {
            $articuloItems = Articulo::pluck('codigoUnico','id')->toArray();
            $view->with('articuloItems', $articuloItems);
        });
        View::composer(['compras.fields'], function ($view) {
            $proveedorItems = Proveedor::pluck('nombre','id')->toArray();
            $view->with('proveedorItems', $proveedorItems);
        });
        View::composer(['articulos.fields'], function ($view) {
            $marcaItems = Marca::pluck('nombre','id')->toArray();
            $view->with('marcaItems', $marcaItems);
        });
        View::composer(['articulos.fields'], function ($view) {
            $tipo_articuloItems = TipoArticulo::pluck('nombre','id')->toArray();
            $view->with('tipo_articuloItems', $tipo_articuloItems);
        });
        //
    }
}