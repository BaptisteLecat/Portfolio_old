var projectContainer_hidden = false;
var firstDisplay = true;
var locked = false; //To prevent spamming click.

function unlock() {
  locked = false;
}

$("#project nav ul li").click(function () {
  if (!$(this).hasClass("selected")) {
    $("#project nav ul li.selected").removeClass("selected");
    $(this).addClass("selected");
    hideProjectContainer();

    projectSwitcher($(this).attr("name"));
  }
});

$("#project .app_container .project_wrapper").on(
  "click",
  ".project",
  function () {
    if (!locked) {
      locked = true;
      setTimeout(unlock(), 10000);
      if (projectContainer_hidden) {
        showProjectContainer();
        projectContainer_hidden = false;
      } else {
          if(firstDisplay){
            showProjectContainer();
            projectContainer_hidden = false;
            firstDisplay = false;
          }else{
            hideProjectContainer();
            setTimeout(() => {
                
                showProjectContainer();
            }, 1000);
            projectContainer_hidden = false;
          }
      }
    }
  }
);

$("#project .project_container picture.close").click(function () {
    if (!locked) {
        locked = true;
        setTimeout(unlock(), 10000);
        if (!projectContainer_hidden) {
            hideProjectContainer();
            projectContainer_hidden = true;
          }
    }
});

function hideProjectContainer() {
  $("#project .project_container").css("width", "0px");
  $("#project .project_container").css("padding", "0px");
  //$("#project .project_container").children().css("display", "none");
  $("#project .project_container header").css("display", "none");
  $("#project .project_container img").css("display", "none");
  $("#project .project_container p").css("display", "none");
  $("#project .project_container section").css("display", "none");
}

function showProjectContainer() {
  setTimeout(() => {
    $("#project .project_container").css("width", "200px");
  }, 100);
  setTimeout(() => {
    $("#project .project_container").css("padding", "15px");
    $("#project .project_container header").css("display", "flex");
    $("#project .project_container img").css("display", "block");
    $("#project .project_container section").css("display", "flex");
    $("#project .project_container p").css("display", "block");
  }, 500);
}
