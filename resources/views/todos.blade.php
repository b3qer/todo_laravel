<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link href="{{URL::asset('css/todo.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">

</head>

<body>



    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Thing</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="/insert" method="post">
                        @csrf
                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="Title" required="required " name="title">
                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="Description" required="required" name="desc">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Add">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>To Do <b>List</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <a href="#myModal" class="btn btn-info add-new" data-toggle="modal"><i class="fa fa-plus"></i>
                            Add New</a></a>
                    </div>
                </div>

            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$todos->isEmpty())
                        @foreach ($todos as $todo)
                        <tr>
                                <td>{{$todo->title}}</td>
                                <td>{{$todo->desc}}</td>
        
                                <td>
                                    <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
        
                                <a class="delete " title="Delete" data-toggle="tooltip" href="/delete/{{$todo->id}}"><i
                                            class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                        @endforeach
                   
                        
                    @endif
                   


                </tbody>

            </table>
            @if ($todos->isEmpty())
            <div class="row "style=" text-align: center;">
                <h4>Nothing to do !</h4>
            </div>
            @endif
            <div style=" text-align: right;">

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
        </div>
    </div>
</body>

</html>