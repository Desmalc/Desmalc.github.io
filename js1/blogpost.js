 function collectPost() {//this function collects posts entered and parses it into the blog for display
	var post = document.getElementById("postproblem").value;
	if (post.length >= 2) {//if a post is present, send it to the blog
	document.getElementById("Problemmsg").style.color = "blue";
	document.getElementById("Problemmsg").innerHTML = post;
	}

}
//create a jquery function that triggers the handleSubmit function when d data is submitted and gets d data in the comment form
$(function() {
  $('#commentform').submit(handleSubmit);
});
//when handle submit is called, it retrieves d data in the form and stores it in an object called data
function handleSubmit() {
  var form = $(this);
  var data = {
    "comment_author": form.find('#comment_author').val(),
    "email": form.find('#email').val(),
    "comment": form.find('#comment').val(),
    "comment_post_ID": form.find('#comment_post_ID').val()
  };

  postComment(data);

  return false;
}

function postComment(data) {
  // send the data to the server
}

function postComment(data) {
  $.ajax({
    type: 'POST',
    url: 'post_comment.php',
    data: data,
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    },
    success: postSuccess,
    error: postError
  });
}

function postSuccess(data, textStatus, jqXHR) {
  // add comment to UI
}

function postError(jqXHR, textStatus, errorThrown) {
  // display error
}