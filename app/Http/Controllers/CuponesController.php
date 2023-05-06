<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuponesController extends Controller
{
    function ObtenerCupon(Request $request)
    {
        $cupon = DB::table('cupon') 
                    ->join('detallefactura','detallefactura.idDetalleFactura','=','cupon.idDetalleFactura')
                    ->join('factura','factura.idFactura','=','detallefactura.idFactura')
                    ->join('cliente','cliente.idCliente','=','factura.idCliente')
                    ->join('promocion','detallefactura.idPromocion','=','promocion.idPromocion')
                    ->join('empresa','empresa.idEmpresa','=','promocion.idEmpresa')
                    ->select('cliente.dui','promocion.titulo','empresa.nombre as Empresa','cupon.codigoCupon','promocion.fechaFin','promocion.precio as Precio','cupon.estadoCupon as Estado')
                    ->where('cupon.codigoCupon','=',$request->codigoCupon)->first();                    
        return response()->json(["cupon"=>$cupon]);
        //return $cupon;
        
    }

    function CanjearCupon(Request $request)
    {
        $codigoCupon = $request->codigoCupon;
        $affectedRows = Cupon::where('CodigoCupon',$codigoCupon)->update(['estadoCupon'=>0]);
        return response()->json(["Cupones"=>$affectedRows]);
    }
}
