$runCrawl = false;
$auto = false;
$(document).on("click", "#btn-submit", function(){
    if ($runCrawl) {
        $("#btn-submit").html("Crawl");
        $runCrawl = false;
        $auto = false;
        clearInterval(myInterval);
    } else {
        $runCrawl = true;
        $("#btn-submit").html("Stop");
        if ($("#checkAuto").prop("checked")) {
            $auto = true;
        }
        if ($auto) {
            console.log("auto");
            var myInterval = setInterval(crawling, 10000);
        } else {
            crawling();
            $("#btn-submit").html("Crawl");
            $runCrawl = false;
        }
    }
});
function crawling() {
    var jqxhr = $.post( $("#form-crawler").attr("action"), {
        query: $("#input-query").val(),
        latitude: $("#input-latitude").val(),
        longitude: $("#input-longitude").val(),
        range: $("#input-range").val(),
        _token: $('input[name="_token"]').val(),
        "result-type": $("#resultType").val()
    }, function() {
        console.log("success");
    }).fail(function() {
        console.log("error");
    });
};
