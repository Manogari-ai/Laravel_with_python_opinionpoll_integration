document.addEventListener('DOMContentLoaded', function () {

    const questions = document.querySelectorAll('.question-card');

    let currentIndex = window.lastQuestionIndex || 0;

    function showQuestion(index) {

        questions.forEach((q, i) => {

            if (i === index) {
                q.classList.remove('d-none');
            } else {
                q.classList.add('d-none');
            }

        });

    }

    showQuestion(currentIndex);

    const prevBtns = document.querySelectorAll('.prev-btn');
    const nextBtns = document.querySelectorAll('.next-btn');
    const voteBtns = document.querySelectorAll('.vote-btn');

    prevBtns.forEach(btn => {

        btn.addEventListener('click', function () {

            if (currentIndex > 0) {
                currentIndex--;
                showQuestion(currentIndex);
            }

        });

    });

    nextBtns.forEach(btn => {

        btn.addEventListener('click', function () {

            if (currentIndex < questions.length - 1) {
                currentIndex++;
                showQuestion(currentIndex);
            }

        });

    });

    voteBtns.forEach((btn, index) => {

        btn.addEventListener('click', function () {

            const form = questions[index].querySelector('form');
            const selected = form.querySelector('input[name="choice_id"]:checked');

            if (!selected) {
                alert('Please select an option before voting.');
                return;
            }

            form.submit();

        });

    });

});


setTimeout(() => {
    document.querySelectorAll('.custom-alert').forEach(el => {
        el.style.display = 'none';
    });
}, 4000);