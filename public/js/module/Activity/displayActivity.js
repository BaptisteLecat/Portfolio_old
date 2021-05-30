function displayActivity(data, activityElement) {
    $(activityElement).attr("name", data.index);
    $(activityElement)
        .find(".picture_container picture img")
        .attr("src", `assets/img/${$(activityElement).attr("id")}/${data.activity.picture}`);
    $(activityElement).find(".content h5").text(data.activity.title);
    $(activityElement).find(".content h6").text(data.activity.date);
}