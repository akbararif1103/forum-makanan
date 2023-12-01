$(document).ready(function () {
  $("#sidebar").mCustomScrollbar({
    theme: "minimal",
  });

  $("#sidebarCollapse").on("click", function () {
    $("#sidebar, #content").toggleClass("active");
    $(".collapse.in").toggleClass("in");
    $("a[aria-expanded=true]").attr("aria-expanded", "false");
  });
});

function reply(id, name) {
  title = document.getElementById('title');
  title.innerHTML = "Reply to " + name;
  document.getElementById('reply_id').value = id;
}