$(function() {
/*    $(document).on("click", ".mobile_menu", function(e) {
        e.preventDefault();
        $(".mobile_menu_container").addClass("loaded");
        $(".mobile_menu_overlay").fadeIn();
    });*/

    $(document).on("click", ".mobile_menu", function(e) {
        if (this.classList.contains("opened")) {
            $(".mobile_menu_container").removeClass("loaded");
            $(".mobile_menu_overlay").fadeOut();
            this.classList.remove("opened");
        }
        else {
            e.preventDefault();
            $(".mobile_menu_container").addClass("loaded");
            $(".mobile_menu_overlay").fadeIn();
            this.classList.add("opened");
        }
    });

    $(document).on("click", ".mobile_menu_overlay", function(e) {
        $(".mobile_menu_container").removeClass("loaded");
        $(this).fadeOut(function() {
            $(".mobile_menu_container .loaded").removeClass("loaded");
            $(".mobile_menu_container .activity").removeClass("activity");
        });
    });
});