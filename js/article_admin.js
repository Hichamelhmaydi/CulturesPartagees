document.addEventListener('DOMContentLoaded', () => {
    let accepterButtons = document.querySelectorAll('.accepter_art');
    let refuserButtons = document.querySelectorAll('.refuser_art');

    accepterButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            // تغيير لون زر "مقبول" إلى الأخضر
            if (!button.classList.contains('accepter_un')) {
                button.classList.remove('accepter_art');
                button.classList.add('accepter_un');
            }

            // إعادة تعيين لون زر "مرفوض" إلى اللون الافتراضي
            refuserButtons.forEach((refuserButton, refuserIndex) => {
                if (refuserIndex === index) {
                    refuserButton.classList.remove('refuser_un');
                    refuserButton.classList.add('refuser_art');
                }
            });
        });
    });

    refuserButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            // تغيير لون زر "مرفوض" إلى الأحمر
            if (!button.classList.contains('refuser_un')) {
                button.classList.remove('refuser_art');
                button.classList.add('refuser_un');
            }

            // إعادة تعيين لون زر "مقبول" إلى اللون الافتراضي
            accepterButtons.forEach((accepterButton, accepterIndex) => {
                if (accepterIndex === index) {
                    accepterButton.classList.remove('accepter_un');
                    accepterButton.classList.add('accepter_art');
                }
            });
        });
    });
});
