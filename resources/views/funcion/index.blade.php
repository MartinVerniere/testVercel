<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Funciones</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Funciones</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('funcion.create') }}">Añadir Funcion</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID:</th>
                        <th>Pelicula ID:</th>
                        <th>Sala ID:</th>
                        <th>Fecha:</th>
                        <th>Hora:</th>
                        <th>Hablitado:</th>
                        <th width="280px">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funciones as $fun)
                        <tr>
                            <td>{{ $fun->id }}</td>
                            <td>{{ $fun->idPelicula }}</td>
                            <td>{{ $fun->idSala }}</td>
                            <td>{{ $fun->fecha }}</td>
                            <td>{{ $fun->hora }}</td>
                            <td>{{ $fun->habilitado }}</td>
                            <td>
                                <form action="{{ route('funcion.destroy',$fun->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{ route('funcion.update',$fun->id) }}">Habilitar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Deshabilitar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $funciones->links() !!}
        </div>
    </body>
</html>