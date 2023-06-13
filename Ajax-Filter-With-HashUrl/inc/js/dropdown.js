//This file is use for all js functionalites and perform ajax operation, make #Url 
(function ($) {
  var pageId = 1;
  var cat_slug = '';
  var tag_slug = '';
  var hash = window.location.hash;
  if (hash) {
    split_url();
    if (cat_slug || cat_slug == '') {
      document.getElementById("selectPosition").innerText = cat_slug;
      ajaxCall();
    }
    if (tag_slug || tag_slug == '') {
      document.getElementById("select-topic").innerText = tag_slug;
      ajaxCall();
    }
    if (pageId && !cat_slug && !tag_slug) {
      window.location.hash = 'resourcePage=' + pageId;
      ajaxCall();
    }
  }
  else {
    window.location.hash = 'resourcePage=' + 1;
    split_url();
    ajaxCall();
  }
  //Get url and split 
  function split_url() {
    var array = {};
    var result = window.location.hash.substr(1).split('#').reduce(function (result, item) {
      parts = item.split('&');
      for (i = 0; i < parts.length; i++) {
        subparts = parts[i].split('=');
        array[subparts[0]] = subparts[1];
      }
    }, {})
    pageId = array['resourcePage'];
    cat_slug = array['cat_slug'];
    tag_slug = array['tag_slug'];
  };
  //call js on click event of dropdown item 
  $(document).on('click', '.dropdown-item', function (event) {
    event.preventDefault();
    split_url();
    cat_slug = $(this).attr("name");
    ajaxCall();
  });
  //call js on click event of select-topic
  $(document).on('click', '.select-topic', function (tag) {
    tag.preventDefault();
    split_url();
    tag_slug = $(this).attr("name");
    document.getElementById("select-topic").innerText = tag_slug;
    ajaxCall();
  });
  //Pagination Script, Next, Prev
  $(document).on('click', '.pagination', function (e) {
    e.preventDefault();
    split_url();
    page= $(this).attr("page-id");
    if(page=='next'){
      pageId = parseInt(pageId) + 1;
    }
    else if(page=='prev'){
      pageId = pageId - 1;
    }
    else{
      pageId = page;
    }
    ajaxCall();    
  });
  //Reset Button
  $(document).on('click', '.clear', function (event) {
    window.location.hash = 'resourcePage=' + 1;
    window.location.reload();
  })
  //Search page script 
  $(document).on("click", "#find-page", function (event) {
    event.preventDefault();
    split_url();
    pageId = parseInt(document.getElementById("search-text").value);
    var total_page = $(this).attr('total-page');
    if (pageId <= total_page) {
      ajaxCall();
    }
    else {
      alert("Page Not Found");
    }
  });
  //Ajax working for filter category 
  function ajaxCall() {
    $.ajax({
      url: filter_object.ajaxurl,
      data: { 'action': filter_object.action, 'cat_slug': cat_slug, 'pageId': pageId, 'tag_slug': tag_slug },
      type: 'POST',
      success: function (response) {
        if (response && response.length) {
          $(".ajax-results").html(response);
          if ((cat_slug && tag_slug)) {
            window.location.hash = 'resourcePage=' + pageId + '&' + 'cat_slug=' + cat_slug + '&' + 'tag_slug=' + tag_slug;
          }
          else if (tag_slug && !cat_slug) {
            window.location.hash = 'resourcePage=' + pageId + '&' + 'tag_slug=' + tag_slug;
          }
          else if (cat_slug && !tag_slug) {
            window.location.hash = 'resourcePage=' + pageId + '&' + 'cat_slug=' + cat_slug;
          }
          else {
            window.location.hash = 'resourcePage=' + pageId;
          }
        } else {
          $(".ajax-results").html("<p>No post here</p>");
        }
      },
      timeout: 3000 // sets timeout to 1 seconds
    });
  }
})(jQuery);
