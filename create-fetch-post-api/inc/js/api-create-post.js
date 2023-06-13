// Quick Add Post AJAX
var quickAddBtn = document.querySelector('#quick-add-button');

if( quickAddBtn ) {
    quickAddBtn.addEventListener("click", function(){
        var title = document.querySelector('.admin-quick-add [name="title"]').value;
        var content = document.querySelector('.admin-quick-add [name="content"]').value;

        var ourPostData = {
            "title": title,
            "content": content,
            "status": "publish"
        }

        var createPost = new XMLHttpRequest();
        var responsediv = document.getElementById('response');
        createPost.open("POST", 'http://dynamic.test/wp-json/wp/v2/posts');
        createPost.setRequestHeader('X-WP-Nonce', additionalData.nonce);
        createPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        createPost.send(JSON.stringify(ourPostData));
        createPost.onreadystatechange = function() {
                if(createPost.readyState == 4) {
                    if( createPost.status == 201 ) {
                        responsediv.innerHTML = '<h4 style="color:green">Post Added Successfully</h4>';
                    } else {
                        responsediv.innerHTML = '<h4 style="color:red">Submission Failed</h4>';
                    }
                }
            }
    });
}

