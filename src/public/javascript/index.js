$(document).ready(function () {
  if (sessionStorage.getItem("login") == 1) {
    $(".authButton").html("SignOut");
  } else {
    $(".authButton").html("SignIn");
  }

  $(".authButton").click(function () {
    if (sessionStorage.getItem("login") == 1) {
      sessionStorage.removeItem("login");
    }
    location.replace("/login");
  });

  $.ajax({
    url: "/index/operation",
    method: "post",
    data: { action: "getBlogs" },
    dataType: "JSON",
  }).done((data) => {
    console.log(data);
    displayBlogs(data);
  });
});

function displayBlogs(data) {
  var html = "";

  for (var i = 0; i < data.length; i++) {
    if (data[i].status !== "approved") {
      continue;
    }
    var date = new Date(data[i].date);
    var dispDate = `${date.getDate()}/${
      date.getMonth() + 1
    }/${date.getFullYear()} ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`;
    html += `
        <div class="card">
			<div class="row">
				<div class="col-md-5 wrapthumbnail">
					<a href="post.html">
						<div class="thumbnail" style="background-image:url(../public/assets/img/demopic/${Math.floor(
              Math.random() * 9
            )}.jpg);">
						</div>
					</a>
				</div>
				<div class="col-md-7">
					<div class="card-block">
						<h2 class="card-title"><a href="/blog?id=${data[i].blog_id}">${
      data[i].title
    }</a></h2>
						<h4 class="card-text">${
              data[i].text.length > 100
                ? data[i].text.slice(0, 200) +
                  `<a href='/blog?id=${data[i].blog_id}'>Read More</a>`
                : data[i].text
            } </h4>
						<div class="metafooter">
							<div class="wrapfooter">
								<span class="meta-footer-thumb">
								<a href="/dashboard"><img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal"></a>
								</span>
								<span class="author-meta">
								<span class="post-name"><a href="/dashboard">${data[i].author}</a></span><br/>
								<span class="post-date">(${dispDate})</span><span class="dot"></span><span class="post-read">15 min read</span>
								</span>
								<span class="post-read-more"><a href="/blog" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    `;
  }
  $(".blogBody").html(html);
}
