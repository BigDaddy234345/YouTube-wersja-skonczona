document.addEventListener('DOMContentLoaded', function() {
    const likeBtn    = document.getElementById('btn-like');
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
});
document.addEventListener('DOMContentLoaded', function() {
    const submitBtn = document.getElementById('comment-submit-btn');
    const commentInput = document.getElementById('comment-input');
    const videoId = document.getElementById('current-video-id').value;
    const commentsList = document.getElementById('comments-list');
    const likeBtn = document.getElementById('btn-like');
    const likeCountSpan = document.getElementById('like-count');

    if (likeBtn) {
        likeBtn.addEventListener('click', function() {

            if (likeBtn.classList.contains('liked')) return;

            fetch('add_like.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    video_id: videoId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Обновляем цифру на кнопке
                    likeCountSpan.innerText = data.new_likes;
                    
                    const icon = likeBtn.querySelector('i');
                    icon.classList.remove('fa-regular');
                    icon.classList.add('fa-solid');
                    
                    likeBtn.classList.add('liked');
                }s
            })
            .catch(error => console.error('Error:', error));
        });
    }
    if (submitBtn) {
        submitBtn.addEventListener('click', function() {
            const text = commentInput.value.trim();
            if (text === '') return; // 

            fetch('add_comment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    video_id: videoId,
                    text: text
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const newComment = document.createElement('div');
                    newComment.className = 'single-comment';
                    newComment.innerHTML = `<strong>${data.author}</strong><p>${data.text}</p>`;
                    
                    commentsList.insertBefore(newComment, commentsList.firstChild);
                    
                    commentInput.value = '';
                } else {
                    alert('Błąd dodawania komentarza');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }
});
