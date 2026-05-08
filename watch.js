document.addEventListener('DOMContentLoaded', function() {

    // === 1. ЛАЙКИ ===
    const likeBtn = document.getElementById('btn-like');
    const dislikeBtn = document.getElementById('btn-dislike');

    if (likeBtn) {
        likeBtn.addEventListener('click', function() {
            likeBtn.style.color = '#3ea6ff';
            if (dislikeBtn) dislikeBtn.style.color = '';
        });
    }

    if (dislikeBtn) {
        dislikeBtn.addEventListener('click', function() {
            dislikeBtn.style.color = '#3ea6ff';
            if (likeBtn) likeBtn.style.color = '';
        });
    }

    // === 2. КОММЕНТАРИИ ===
    const inputField = document.getElementById('comment-input');
    const submitBtn = document.getElementById('comment-submit-btn');
    const commentsList = document.getElementById('comments-list');

    // Проверяем, существуют ли кнопки комментов, ПРЕЖДЕ чем вешать на них клик
    if (submitBtn && inputField && commentsList) {
        submitBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const text = inputField.value.trim();
            if (text !== "") {
                const newComment = document.createElement('div');
                newComment.classList.add('single-comment');
                newComment.style.cssText = "margin-top: 15px; border-bottom: 1px solid #333; padding-bottom: 10px;";
                newComment.innerHTML = `
                    <strong style="color: #3ea6ff;">Twój Kanał (Ty)</strong>
                    <p style="margin: 5px 0;">${text}</p>
                `;
                commentsList.prepend(newComment);
                inputField.value = "";
            }
        });

        inputField.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                submitBtn.click();
            }
        });
    }
});