<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Compras</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Compras</h2>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID:</th>
                        <th>Email:</th>
                        <th>Observaciones:</th>
                        <th>Fecha:</th>
                        <th>Accion:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $com)
                        <tr>
                            <td>{{ $com->id }}</td>
                            <td>{{ $com->emailCliente }}</td>
                            <td>{{ $com->observaciones }}</td>
                            <td>{{ $com->fecha }}</td>
                            <td>
                                <form action="{{ route('detallesCompra.index',$com->id) }}" method="Post">
                                    @csrf
                                    <input type="hidden" name="idCompra" value="{{ $com->id }}">
                                    <button type="submit" class="btn btn-primary">Ver ordenes</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $compras->links() !!}
        </div>
    </body>
</html>