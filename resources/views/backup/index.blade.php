 {!! Form::open([]) !!}

  {!! Form::text('name', @$name) !!}

  {!! Form::password('password') !!}

  {!! Form::submit('Send') !!}

  {!! Form::close() !!}

      <link href="{{ ('public/css/app.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
      <script src="{{ elixir('js/app.js') }}"></script>