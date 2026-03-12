<!DOCTYPE html>
<html>
<head>
<title>Opinion Poll</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="text-center">Opinion Poll</h2>

@if(session('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif


@foreach($questions as $question)

<div class="card mt-4">
<div class="card-body">

<h5>{{ $question['question_text'] }}</h5>

<form method="POST" action="{{ route('poll.vote') }}">
@csrf

@foreach($question['choices'] as $choice)

<div class="form-check">

<input class="form-check-input"
type="radio"
name="choice_id"
value="{{ $choice['id'] }}" required>

<label class="form-check-label">

{{ $choice['choice_text'] }}

</label>

</div>

@endforeach

<button class="btn btn-success mt-3">

Vote

</button>

</form>

</div>
</div>

@endforeach

</div>

</body>
</html>