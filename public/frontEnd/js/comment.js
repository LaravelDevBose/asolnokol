function changeVisibility() {
   document.getElementById("reply-area").style.visibility = "visible";    
   document.reply-form.name.disabled=false;
}

function enableEmail() {
   document.reply-form.email.disabled=false;

}

function enablePhone() {
   document.reply-form.phone.disabled=false;
}

function enableComment() {
   document.reply-form.comment.disabled=false;
}

function showForm( )
{
  document.getElementById("reply").style.visibility = "hidden";
  setTimeout ( "changeVisibility()", 300 );
}