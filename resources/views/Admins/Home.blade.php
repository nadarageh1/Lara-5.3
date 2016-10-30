<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('Admins/home') }}">Admins</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('Admins/home') }}">View All Nerds</a></li>
    </ul>
      <ul class="nav navbar-nav pull-right">
{{ Html::linkAction('AdminsController@logout', 'logout', '', array('class' => 'btn btn-warning btn btn-small ')) }}

    </ul>
</nav>

<h1>All Users</h1>



<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- Edit the user (uses the delete method found at GET /nerds/{id} -->
               {{ Html::linkAction('AdminsController@edit', 'Edit', array('id' => $user->id ), array('class' => 'btn btn-success btn btn-small ')) }}
                                       


                <!-- Delete this User (uses the edit method found at GET /nerds/{id}/edit -->
                {{ Form::open(array('url' => 'Admins/' . $user->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger 
                    btn btn-small')) }}
                {{ Form::close() }}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
   <li style="float:right;position:absolute;bottom:100px;" >
                    {{ $users->render() }}
                </li>
</html>

