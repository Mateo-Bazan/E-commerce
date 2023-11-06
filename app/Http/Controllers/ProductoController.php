<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Producto::$rules);
        

        /*if($request->hasFile('foto')){
            $request["foto"] = $request->file('foto')->storeAs('img_productos', $request->file('foto')->getClientOriginalName(), 'public');
            //$request["foto"] = $request->file('foto')->store('img_productos','public');
        }*/

        /*if ($foto = $request->file('foto')){
            $guardar_foto = "img/";
            $foto_producto = $foto->getClientOriginalName(). "." . $foto->getClientOriginalExtension();
            $foto->move($guardar_foto, $foto_producto);
            $request['foto'] =  $foto_producto;
        }*/

        $imagen = $request->file('foto');
        $nombreImagen = time() . $imagen->getClientOriginalName();
        $imagen->move(public_path('img/img-productos'), $nombreImagen);

        $request["foto"] = $nombreImagen;

        //calcular iva
        $iva = $request["precio_costo"];
        $iva = $iva * 0.21 + $iva;

        //calcular iibb
        $iibb = $iva * 0.025 + $iva;

        //calcular impuesto provincia
        $ip = $iibb * 0.03 + $iibb;

        //calcular ganancia
        $precio_final = $ip * 0.5 + $ip;

        //asignar todos los valores de impuestos al array
        $request["iva"] = $iva;
        $request["ibb"] = $iibb;
        $request["impuesto_provincia"] = $ip;
        $request["precio_venta"] = $precio_final;

        //$producto = Producto::create($request->all());
        $producto = Producto::create([
        "rubro" => $request["rubro"],
        "subrubro" => $request["subrubro"],
        "producto" => $request["producto"],
        "marca" => $request["marca"],
        "stock" => $request["stock"],
        "precio_costo" => $request["precio_costo"],
        "iva" => $request["iva"],
        "ibb" => $request["stock"],
        "impuesto_provincia" => $request["impuesto_provincia"],
        "precio_venta" => $request["precio_venta"],

        "foto" => $nombreImagen,
        ]);

        return redirect()->route('productos.index')
            ->with('success', 'Producto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);
        //calcular iva
        $iva = $request["precio_costo"];
        $iva = $iva * 0.21 + $iva;

        //calcular iibb
        $iibb = $iva * 0.025 + $iva;

        //calcular impuesto provincia
        $ip = $iibb * 0.03 + $iibb;

        //calcular ganancia
        $precio_final = $ip * 0.5 + $ip;

        //asignar todos los valores de impuestos al array
        $request["iva"] = $iva;
        $request["ibb"] = $iibb;
        $request["impuesto_provincia"] = $ip;
        $request["precio_venta"] = $precio_final;
        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
