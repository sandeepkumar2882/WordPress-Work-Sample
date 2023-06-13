var PostsBtn = document.getElementById("posts-btn");
var PostsContainer = document.getElementById("posts-container");

if( PostsBtn ) {
    PostsBtn.addEventListener("click", function(){

        var ourRequest = new XMLHttpRequest();
        ourRequest.open('GET', 'http://dynamic.test/wp-json/wp/v2/posts?order=desc');
        ourRequest.onload = function() {
            if(ourRequest.status >= 200 && ourRequest.status < 400) {
                var data = JSON.parse(ourRequest.responseText);
                createHTML(data);
                console.log(data);
            } else {
                console.log('We connected to the server, but it returned an error.');
            }
        }
        ourRequest.onerror = function() {
                        console.log('Connection error');
                    }            
                    ourRequest.send();
    });
}

function createHTML(postData){
    var postHTML = '';
    for(var i=0; i<postData.length; i++){
        postHTML += '<h2>' + postData[i].title.rendered + '</h2>';
        postHTML += '<h4>' + postData[i].excerpt.rendered + '</h4>';        
    }
    PostsContainer.innerHTML = postHTML;
}