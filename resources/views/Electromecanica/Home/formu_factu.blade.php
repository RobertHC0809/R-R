<div class="table-container">
            
   <table class="table table-responsive" style="overflow: auto; position: sticky;">

   <thead>
       <tr> 
           <th>No.Reserva</th>
           <th>Nombre del Paquete</th>
           <th>Fecha Seleccionada</th>
           <th>Hora de Inicio</th>
           <th>N° Personas</th>
           <th>Metodo de Pago</th>
           <th>Estado de la Reserva</th>
           <th>Acción</th>
       </tr>
   </thead>
   <tbody class="table-hover">

       

       @foreach ($reservas as $reserva)
       <tr>
           <td>{{$reserva->IdReservacion}}</td>
           <td>{{$reserva->Nombre}}</td>
           <td>{{$reserva->FechaSeleccionada}}</td>
           <td>{{$reserva->Horainicio}}</td>
           
           <td>{{$reserva->CantidadPersonas}}</td>
           <td>{{$reserva->Metodo_Pago}}</td>
           <td>{{$reserva->EstadoReservacion}}</td>
           
           <td>  

               @if ($reserva->EstadoReservacion == 'PAGO PENDIENTE')
                    {{-- para pagar la reserva, se muestra solo si el estado es PAGO PENDIENTE --}}
                    @if ($reserva->fecha_expiracion < now())
                    <form action="{{ route('Reservacion.expirar', $reserva->IdReservacion) }}" method="GET">
                    @endif
                    <form action="{{ route('createTransaction', $reserva->IdReservacion) }}" method="GET">
                       @csrf <!-- Token CSRF para protección -->
                       <button type="submit" class="btn btn-success mt-3">pagar</button>
                   </form> 
               @endif
                  
                   {{-- para cancelar la reserva y verificar si esta expirada --}}
                   @if ($reserva->EstadoReservacion == 'PAGO PENDIENTE' && $reserva->fecha_expiracion < now())
                   <form action="{{ route('Reservacion.expirar', $reserva->IdReservacion) }}" method="GET">
               @else
                   <form action="{{ route('formulario_cancelar') }}" method="GET">
               @endif
                   @csrf <!-- Token CSRF para protección -->
                   <input type="hidden" name="idReserva" value="{{$reserva->IdReservacion }}" readonly>
                   <input type="date" name="fecha_reserva" value="{{$reserva->FechaSeleccionada}}" hidden readonly>
                   <button type="submit" class="btn btn-danger mt-3">Cancelar</button>
               </form>
               
                   
           </td>
        </tr>
       @endforeach
       <!-- Agregar más filas según sea necesario -->
   </tbody>
</table>
PAYPAL_CURRENCY=USD