<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('nerds') }}">View All Nerds</a></li>
        <li><a href="{{ URL::to('nerds/create') }}">Create a Nerd</a>
    </ul>
</nav>

<h1>All the Nerds</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Nerd Level</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}         </td>
            <td>{{ $user->name }}       </td>
            <td>{{ $user->email }}      </td>
            <td>{{ $user->password }}   </td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>
               {{ Html::linkAction('AdminsController@edit'  ,  'Edit',$user->id, array('class' => 'btn btn-success')) }} 
       
               {{ Html::linkAction('AdminsController@destroy'  ,  'Delete',$user->id, array('class' => 'btn btn-danger')) }} 
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>