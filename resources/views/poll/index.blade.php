<!DOCTYPE html>
<html>
<head>
<title>Opinion Poll</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/poll.css') }}">
</head>

<body>

<!-- Hero Section -->
<div class="hero">
    <h1>Opinion Poll System</h1>
    <p>Share your opinion and see what others think!</p>
    <img src="/images/logo.webp">
</div>

<div class="container mt-5">

    <!-- Session Messages -->
    <!-- @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif -->

    <!-- @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif -->

    <!-- Poll Questions -->
    <div id="poll-questions">
       @foreach($questions as $index => $question)
            <div class="card poll-card mt-4 question-card {{ $index !== session('question_index',0) ? 'd-none' : '' }}">

                <div class="card-body">

                    @if(session('message') && session('question_index') == $index)
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif

                    @if(session('error') && session('question_index') == $index)
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <h5>{{ $question['question_text'] }}</h5>

                    <form method="POST" action="{{ route('poll.vote') }}" class="vote-form">
                        @csrf
                        <input type="hidden" name="question_index" value="{{ $index }}">

                        @foreach($question['choices'] as $choice)
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                name="choice_id" value="{{ $choice['id'] }}">
                            <label class="form-check-label">{{ $choice['choice_text'] }}</label>
                        </div>
                        @endforeach

                        <div class="mt-3 d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                            <button type="button" class="btn btn-success vote-btn">Vote</button>
                            <button type="button" class="btn btn-primary next-btn">Next</button>
                        </div>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Static Content Section -->
<div class="container info-section">
    <div class="row text-center">
        <div class="col-md-4">
            <img src="/images/share_pic.jpg" width="120">
            <h5 class="mt-3">Share Opinion</h5>
            <p>Express your thoughts through polls and surveys.</p>
        </div>
        <div class="col-md-4">
            <img src="/images/real_vote.png" width="120">
            <h5 class="mt-3">Real Results</h5>
            <p>View real-time voting results instantly.</p>
        </div>
        <div class="col-md-4">
            <img src="/images/Community_voice.png" width="120">
            <h5 class="mt-3">Community Voice</h5>
            <p>Join the community and make your voice count.</p>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <p>© 2026 Opinion Poll System | Built with Laravel</p>
</div>

<!-- Bootstrap JS -->

<script>
    window.lastQuestionIndex = {{ session('question_index', 0) }};
</script>

<script src="{{ asset('js/poll.js') }}"></script>

</body>
</html>