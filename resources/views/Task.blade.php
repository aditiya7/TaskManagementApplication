<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            color: #343a40;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #1111;
            color: #fff;
            border-bottom: none;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .table {
            margin-top: 20px;
        }

        th, td {
            text-align: center;
            vertical-align: middle !important;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .input-group {
            margin-bottom: 20px;
        }
        </style>
</head>
<body>
    
<div class="container">
    <h1>Task Manager</h1>

    <div class="card">
        <div class="card-header">
            <form method="POST" action="{{route('Task.store')}}">
                @csrf
                <div class="input-group">
                    <input type="text" name ="name" class="form-control"  placeholder="Enter task" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <input type="text" name="description" class="form-control" placeholder="Enter description" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Create Task</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Completed</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($task as $row)
                        <tr>
                        
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->description }}</td>
                            <td>
                              <input type="checkbox" name="completed" {{ $row->completed ? 'true' : '' }}>
                             </td>
                            <td>
                                <form method="get" action="{{route('Task.edit',['task'=>$row])}}">
                                    @csrf
                                    <button class="btn btn-primary" type="submit">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('Task.delete',['task'=>$row])}}">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-primary" type="submit" value="delete">Delete</button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
</body>
</html>