<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\Categoria;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class CarritoController extends Controller
{
    public function shop()
    {
        $productos = Producto::all();
        //dd($productos);
        return view('home')->withTitle('E-COMMERCE STORE | SHOP')->with(['productos' => $productos]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request){
        //dd($request);
        \Cart::add([
            'id' => $request["id"],
            "name" => $request["rubro"],
            "price" => $request["precio_venta"],
            'quantity' => $request["quantity"],
            'attributes' => array(
                'image' => $request["foto"],
                'slug' => $request["producto"]
            ),
        ]);
        /*\Cart::add(array(
            'id' => $request["id"],
            'rubro' => $request["rubro"],
            'precio_venta' => $request["precio_venta"],
            'quantity' => $request["quantity"],
            'attributes' => array(
                'foto' => $request["foto"],
                'producto' => $request->producto
            )
        ));*/
        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        if($request["mas"] == TRUE){

            $quantity = $request["quantity"];
            $quantity += 1;

            $id = $request["id"];
            $validacion_stock = DB::select("SELECT stock from productos WHERE productos.id = $id")[0]->stock;

            //dd($validacion_stock);
            if($quantity == 0){
                \Cart::remove($request["id"]);
                return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
            }
            elseif($validacion_stock >= $quantity){
                \Cart::update($request->id,
                array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $quantity
                    ),
            ));
            return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
            }
            else{
                \Cart::update($request->id,
                array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $validacion_stock
                    ),
                ));
                return redirect()->route('cart.index')->with('alert_msg', 'No Hay Sufciente Stock! El máximo es '.$validacion_stock);
            }
    }
        else{
            $quantity = $request["quantity"];
            $quantity -= 1;
            $id = $request["id"];
            $validacion_stock = DB::select("SELECT stock from productos WHERE productos.id = $id")[0]->stock;

            //dd($validacion_stock);
            if($quantity == 0){
                \Cart::remove($request["id"]);
                return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
            }
            elseif($validacion_stock >= $quantity){
                \Cart::update($request->id,
                array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $quantity
                    ),
            ));
            return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
            }
            else{
                \Cart::update($request->id,
                array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $validacion_stock
                    ),
                ));
                return redirect()->route('cart.index')->with('alert_msg', 'No Hay Sufciente Stock! El máximo es '.$validacion_stock);
            }
        }
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }


    public function generarFactura(){
        $admin = DB::select('SELECT * from users where id_rol = 1');
        $user = Auth::user();
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);

        $userAfip = DB::select('SELECT tipo_inscripcion from categorias where id ='. $user->id_afip);
        //dd($userAfip[0]->tipo_inscripcion);
        $seller = new Buyer([
            'name'          => $admin[0]->razon_social,
            'custom_fields' => [
                'Domicilio' => $user->domicilio,
                'CUIT' => $user->cuit,
                'Email' => $admin[0]->email,
                'Telefono' => $admin[0]->telefono,
                'Ingresos Brutos' => $user->cod_iibb,
                'condición frente al IVA'        => $userAfip[0]->tipo_inscripcion,
                'Inicio de Actividades' => $user->inicio_actividad,
            ],
        ]);

        $customer = new Buyer([
            'name'          => $user->razon_social,
            'custom_fields' => [
                'Domicilio' => $user->domicilio,
                'CUIT' => $user->cuit,
                'condición frente al IVA' => $userAfip[0]->tipo_inscripcion,
            ],
        ]);

        foreach ($cartCollection as $producto){
            $items[] = (new InvoiceItem())->title($producto['attributes']['slug'])
            ->pricePerUnit($producto->price)
            ->quantity($producto->quantity)
            ;
        }
        

        $invoice = Invoice::make()
            ->buyer($customer)
            ->seller($seller)
            ->logo('/img/lambo.jpg')
            ->currencySymbol('$')
            ->currencyCode('ARS')
            ->taxRate(21)
            ->addItems($items);

        return $invoice->stream();
    }

}

