jQuery(document).ready(function ($) {
   

    $('.like-btn, .dislike-btn').on('click', function () {

        var postId = like_post_id;
        var voteType = $(this).data('vote-type');

        console.log('postId: '+postId);
        console.log('voteType: '+voteType);

        
        var liked_posts = JSON.parse(localStorage.getItem("like-dislike-posts"));
        console.log(liked_posts);

            if(liked_posts.includes(postId) && voteType === 'dislike'){
                console.log('disliked');
                //remove id from array
                liked_posts = liked_posts.filter(item => item !== postId);

            }else if(!liked_posts.includes(postId) && voteType == 'like'){
                console.log('liked');
                liked_posts.push(postId);
            }else{
                return false;
            }
     

        $.ajax({
            type: 'post',
            url: ajaxurl,
            data: {
                action: 'handle_like_dislike_vote',
                post_id: postId,
                vote_type: voteType
            },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    localStorage.setItem("like-dislike-posts", JSON.stringify(liked_posts));
                   
                    // Atualizar a contagem de likes/dislikes na interface do usuário
                    var currentCount = parseInt($('#post-' + postId + '-count').text());
                    if (voteType === 'like') {
                        $('#post-' + postId + '-count').text(currentCount + 1);
                    } else if (voteType === 'dislike' && currentCount > 0) {
                        $('#post-' + postId + '-count').text(currentCount - 1);
                    }
                }
            }
        });
    });
});

