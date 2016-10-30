

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
        <a class="navbar-brand" href="{{ URL::to('Admins/home') }}">Users</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('Admins/home') }}">View All Nerds</a></li>
    </ul>
      <ul class="nav navbar-nav pull-right">
{{ Html::linkAction('AdminsController@logout', 'logout', '', array('class' => 'btn btn-warning btn btn-small ')) }}
    </ul>
</nav>

<h1>Edit {{ $user->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('Admins.update', $user->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name',$user->name  , array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', $user->email , array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('Password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the User!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>