$("document").ready(function () {
    $("#btn-menu").on("click", function () {
        $("#span-menu").toggleClass("fa-bars fa-times");
        $(".main-menu").toggleClass("-translate-x-full");
        $("#hTitle").toggle("", false);
    });
    $(document).on("click", function (e) {
        if (
            $(e.target).closest(".main-menu").length == 0 &&
            !$(".main-menu").hasClass("-translate-x-full") &&
            $(e.target).closest(".menu-btn").length == 0
        ) {
            $("#span-menu").toggleClass("fa-bars fa-times");
            $(".main-menu").toggleClass("-translate-x-full");
            $("#hTitle").toggle("", false);
        }
    });
    $(".down-trigger").each(function () {
        $(this).on("click", function () {
            id = $(this).attr("id");
            $(".div-content").each(function () {
                if (!$(this).hasClass(id)) {
                    $(this).slideUp();
                }
            });
            $("span").each(function () {
                if (!$(this).hasClass(id)) {
                    $(this).removeClass("-rotate-90");
                }
            });
            $("div." + id).toggle("", false);
            $("span." + id).toggleClass("-rotate-90");
        });
    });

  
    $(".confirm").each(function () {
        $(this).on("click", function (e) {
            form = $(this).attr("form");
            form = $("#" + form);
            e.preventDefault();
            message = $(this).attr("data-label");
            Swal.fire({
                title: message,
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Proceder",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                } else {
                    return false;
                }
            });
        });
    });

    /* Loading Behavior */
    setTimeout(() => {
        $("#loader").addClass("hidden");
    }, 500);
    $("*[href]").one("click", function () {
        $("#loader").toggleClass("hidden flex");
    });
    $("form").one("submit", function () {
        $("#loader").toggleClass("hidden flex");
    });

  

    
});
