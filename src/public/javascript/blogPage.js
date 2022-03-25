$(document).ready(function () {
  if (sessionStorage.getItem("login") == 1) {
    $(".authButton").html("SignOut");
  } else {
    $(".authButton").html("SignIn");
  }

  //condition to check is user logged in
  $(".authButton").click(function () {
    if (sessionStorage.getItem("login") == 1) {
      sessionStorage.removeItem("login");
    }
    location.replace("/login");
  });

  /**
   * ajax call to get particular blog
   */
  $.ajax({
    url: "/blog/getblog",
    method: "post",
    data: {
      blog_id: new URLSearchParams(window.location.search).get("id"),
    },
    dataType: "JSON",
  }).done((data) => {
    if (data[0].status == "approved") {
      $(".title").html(data[0].title);
      $(".author").html(data[0].author);
      $(".date").html(data[0].date);
      $(".text").html(data[0].text);
    } else {
      location.replace("/");
    }
  });
});
