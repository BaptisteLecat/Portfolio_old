function displayActivity(data, activityElement) {
    $(activityElement).attr("name", data.index);
    var img = $(activityElement).attr("id");
    img = img.toLowerCase();
    console.log(img.toLowerCase());
    $(activityElement)
        .find(".picture_container picture img")
        .attr("src", `assets/img/${img}/${data.activity.picture}`);
    $(activityElement).find(".content h5").text(data.activity.title);
    $(activityElement).find(".content h6").text(data.activity.date);
}