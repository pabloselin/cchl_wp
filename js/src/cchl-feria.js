function cchl_enableFiltersFeria(element) {
    /* Activa los filtros para los eventos que se muestran */
    var eventos = jQuery("div.evento-unitario", element);
    //reseteo las ocultaciones previas
    eventos.show();

    var avevs = [];
    var evsarr = [];
    //Filtro para tema de evento
    var temevs = [];
    var temsarr = [];
    //Escaneo todos los tipos de eventos disponibles
    eventos.each(function() {
        var evs = jQuery(this).data("cchl_tipoevento");
        var tems = jQuery(this).data("cchl_temaevento");
        if (typeof evs != "undefined") {
            evsarr = evs.split(" ");
            //console.log(evsarr);
            for (var i = 0, l = evsarr.length; i < l; i++) {
                if (jQuery.inArray(evsarr[i], avevs) == -1) {
                    avevs.push(evsarr[i]);
                }
            }
        }
        //Temas
        if (typeof tems != "undefined") {
            temsarr = tems.split(" ");
            //console.log(temsarr);
            for (var i = 0, l = temsarr.length; i < l; i++) {
                if (jQuery.inArray(temsarr[i], temevs) == -1) {
                    temevs.push(temsarr[i]);
                }
            }
        }
    });
    //Construyo menu de navegación
    var filtro = jQuery("div.filtro");
    var filtrotema = jQuery("div.filtrotema");
    //ordeno por nombre
    avevs.sort();
    temevs.sort();
    filtro.empty();
    filtrotema.empty();
    for (var i = 0, l = avevs.length; i < l; i++) {
        filtro.append(
            '<a class="fltip" href="javascript:void(0);" data-tiposw="' +
                avevs[i] +
                '">' +
                cchl.evtipos[avevs[i]] +
                "</a>"
        );
    }

    for (var i = 0, l = temevs.length; i < l; i++) {
        if (typeof cchl.evtemas[temevs[i]] != "undefined") {
            filtrotema.append(
                '<a class="fltem" href="javascript:void(0);" data-tiposw="' +
                    temevs[i] +
                    '">' +
                    cchl.evtemas[temevs[i]] +
                    "</a>"
            );
        }
    }

    //Tabs
    jQuery("div.filtrotab", element).hide();
    jQuery("div.filtrotab.active", element).show();
    //Tabs filtro
    jQuery(".filtronav a", element).on("click", function(event) {
        event.preventDefault();
        //Reseteo el filtro
        eventos.show();
        //Saco las clases activas
        jQuery("div.filtrotema a, div.filtro a", element).removeClass("on");
        var active = jQuery(".filtronav a.active", element);
        var activetab = jQuery(".filtrotab.active", element);
        activetab.hide().removeClass("active");
        active.removeClass("active");
        thisdatafilter = jQuery(this).attr("data-relfilter");
        jQuery('.filtrotab[data-filter="' + thisdatafilter + '"]', element)
            .show()
            .addClass("active");
        jQuery(this).addClass("active");
    });
    //Ajusto altura para elemento
    var lidiaaltura = jQuery(element).height();
    jQuery("ul.calendario-feria").height(lidiaaltura);

    //Escondo los undefined que queden
    jQuery(
        'a.fltip:contains("undefined"), a.fltem:contains("undefined")'
    ).hide();
}

jQuery(document).ready(function($) {
    $(".calendario-feria").cycle({
        fx: "fade",
        speed: "fast",
        timeout: 0,
        pager: "#navferia",
        width: "100%",
        cleartypeNoBg: true,
        pagerAnchorBuilder: function(index, element) {
            var dia = $(element).data("dia");
            var ndia = $(element).data("ndia");
            var mes = $(element).data("mes");
            var hoy = "otrodia";
            if ($(element).hasClass("hoy")) {
                hoy = "hoy";
            }
            return (
                '<li><a href="#" class="daybox ' +
                hoy +
                '"><span class="dia">' +
                dia +
                ' </span><span class="ndia">' +
                ndia +
                '</span><span class="mes"> ' +
                mes +
                " </span></a></li>"
            );
        },
        onPagerEvent: function(index, element) {
            cchl_enableFiltersFeria(element);
        }
    });

    //Agregar filtro al primer día
    $("ul.calendario-feria li:first").append(function() {
        var eventos = $("div.evento-unitario", this);
        eventos.show();

        var avevs = [];
        var evsarr = [];
        //Filtro para tema de evento
        var temevs = [];
        var temsarr = [];
        //Escaneo todos los tipos de eventos disponibles
        eventos.each(function() {
            var evs = $(this).data("cchl_tipoevento");
            var tems = $(this).data("cchl_temaevento");
            if (typeof evs != "undefined") {
                evsarr = evs.split(" ");
                //console.log(evsarr);
                for (var i = 0, l = evsarr.length; i < l; i++) {
                    if ($.inArray(evsarr[i], avevs) == -1) {
                        avevs.push(evsarr[i]);
                    }
                }
            }
            //Temas
            if (typeof tems != "undefined") {
                temsarr = tems.split(" ");
                //console.log(temsarr);
                for (var i = 0, l = temsarr.length; i < l; i++) {
                    if ($.inArray(temsarr[i], temevs) == -1) {
                        temevs.push(temsarr[i]);
                    }
                }
            }
        });
        //Construyo menu de navegación
        var filtro = $("ul.calendario-feria li:first div.filtro");
        var filtrotema = $("div.filtrotema");

        //ordeno por nombre
        avevs.sort();
        filtro.empty();

        for (var i = 0, l = avevs.length; i < l; i++) {
            filtro.append(
                '<a href="#" data-tiposw="' +
                    avevs[i] +
                    '">' +
                    cchl.evtipos[avevs[i]] +
                    "</a>"
            );
        }

        for (var i = 0, l = temevs.length; i < l; i++) {
            filtrotema.append(
                '<a href="#" data-tiposw="' +
                    temevs[i] +
                    '">' +
                    cchl.evtemas[temevs[i]] +
                    "</a>"
            );
        }

        //Tabs
        $("div.filtrotab", this).hide();
        $("div.filtrotab.active", this).show();
        //Ajusto altura para elemento
        var lidiaaltura = $(this).height();
        $("ul.calendario-feria").height(lidiaaltura);
    });

    $("div.filtro, .eventos-load").on("click", "a.fltip", function(event) {
        $("div.filtro a").removeClass("on");
        console.log("clickfiltro");
        event.preventDefault();
        //console.log($(this).parent());
        //Escojo todos los que corresponden al evento dentro de mi día
        var parentdata = $(this)
            .parent()
            .data("id");
        var parentdiv = $('div.filtro[data-id="' + parentdata + '"]');
        var all = $('div.evento-unitario[data-top="' + parentdata + '"]');
        var thistipo = $(this).data("tiposw");
        var selected = $(
            'div.evento-unitario[data-cchl_tipoevento~="' + thistipo + '"]'
        );
        all.hide();
        selected.show();
        $(this).addClass("on");
    });

    $("div.filtrotema, .eventos-load").on("click", "a.fltem", function(event) {
        $("div.filtrotema a").removeClass("on");
        event.preventDefault();
        //console.log($(this).parent());
        //Escojo todos los que corresponden al evento dentro de mi día
        var parentdata = $(this)
            .parent()
            .data("id");
        var parentdiv = $('div.filtrotema[data-id="' + parentdata + '"]');
        var all = $('div.evento-unitario[data-top="' + parentdata + '"]');
        var thistipo = $(this).data("tiposw");
        var selected = $(
            'div.evento-unitario[data-cchl_temaevento~="' + thistipo + '"]'
        );
        all.hide();
        selected.show();
        $(this).addClass("on");
    });

    //Tabs filtro
    var firstel = $("ul.calendario-feria li:first");
    $(".filtronav a", firstel).on("click", function(event) {
        var eventos = $("div.evento-unitario", this);
        event.preventDefault();
        //Reseteo el filtro
        eventos.show();
        //Saco las clases activas
        $("div.filtrotema a, div.filtro a", firstel).removeClass("on");
        var active = $(".filtronav a.active", firstel);
        var activetab = $(".filtrotab.active", firstel);
        activetab.hide().removeClass("active");
        active.removeClass("active");
        thisdatafilter = $(this).attr("data-relfilter");
        $('.filtrotab[data-filter="' + thisdatafilter + '"]', firstel)
            .show()
            .addClass("active");
        $(this).addClass("active");
    });

    //Hago un filtro para todos los eventos.
    var tipos = cchl.evtipos;
    var temas = cchl.evtemas;
    var cursos = cchl.cursos;
    var filtodos = $(
        "select#todos-eventos-tipos, select#todos-eventos-temas, select#todos-eventos-cursos"
    );

    for (var i in tipos) {
        if (tipos.hasOwnProperty(i)) {
            $(
                'select#todos-eventos-tipos[data-filter="cchl_tipoevento"]'
            ).append('<option value="' + i + '">' + tipos[i] + "</option>");
        }
    }

    for (var i in temas) {
        if (temas.hasOwnProperty(i)) {
            $(
                'select#todos-eventos-temas[data-filter="cchl_temaevento"]'
            ).append('<option value="' + i + '">' + temas[i] + "</option>");
        }
    }

    for (var i in cursos) {
        if (cursos.hasOwnProperty(i)) {
            $('select#todos-eventos-cursos[data-filter="cursos"]').append(
                '<option value="' + i + '">' + cursos[i] + "</option>"
            );
        }
    }

    $(".filtrotab").hide();
    $(".filtrotab.active").show();
    //Tabs filtro
    $(".filtronav.selectabs a").on("click", function(event) {
        event.preventDefault();
        $(".wraptodos h2")
            .empty()
            .append("Escoge un filtro");
        //Saco las clases activas
        $("div.filtrotema a, div.filtro a").removeClass("on");
        var active = $(".filtronav.selectabs a.active");
        var activetab = $(".filtrotab.active");
        activetab.hide().removeClass("active");
        active.removeClass("active");
        thisdatafilter = $(this).attr("data-relfilter");
        $('.filtrotab[data-filter="' + thisdatafilter + '"]')
            .show()
            .addClass("active");
        $(this).addClass("active");
        //Reseteo los filtros
        $(".wraptodos ul.calendario-feria li").empty();
        $(".selectwrap select").val(0);
    });

    filtodos.on("change", function(event) {
        var wraptodos = $(".wraptodos");
        var filtertype = $(this).data("filter");
        var sumheight = 0;
        console.log(filtertype);
        var calappend = $("ul.calendario-feria li", wraptodos);
        var selected = $("option:selected", this);
        $("h2", wraptodos).empty();
        $("h2", wraptodos).append(selected.text());
        //Le meto todos los bichos correspondientes
        var selectedevents = $(
            "div.evento-unitario[data-" +
                filtertype +
                '~="' +
                selected.attr("value") +
                '"]'
        );
        calappend.empty();
        selectedevents
            .clone()
            .appendTo(calappend)
            .show();
        $("ul.calendario-feria li div.evento-unitario", wraptodos).each(
            function(index, element) {
                var elemh = $(element).outerHeight();
                sumheight = sumheight + elemh + 6;
            }
        );
        $("ul.calendario-feria").height(sumheight);
    });

    //Tabs general y filtro
    var tabdias = $(".tabdias");
    var tabtodos = $(".tabtodos");
    var tabgratis = $(".tabgratis");
    var tabsearch = $(".tabsearch");

    tabtodos.hide();
    tabgratis.hide();
    tabsearch.hide();

    $(".navprincipaleventos a").on("click", function(event) {
        var datathis = $(this).data("tab");
        var activetab = $(".navprincipaleventos a.active");
        if (datathis == "link") {
            window.location($(this).attr("href"));
        } else {
            event.preventDefault();
            activetab.removeClass("active");
            $(".tabgen.active")
                .hide()
                .removeClass("active");
            $(this).addClass("active");
            $("#" + datathis)
                .show()
                .addClass("active");
            //Reseteo los filtros
            $(".wraptodos ul.calendario-feria li").empty();
            $(".selectwrap select").val(0);
        }
    });

    //Activo el calendario para el día de hoy
    $("#navferia a.hoy, #diaseventos ul li a.hoy").trigger("click");
});
