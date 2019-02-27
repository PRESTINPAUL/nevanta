jQuery(function(e) {
    var INITIAL = '';

    e.fn.selectric || e.error("Selectric not initialized");
    var t = "sortable",
        n = e.fn.selectric.hooks,
        i = function(t, n) {
            var i = e(t);
            if ("undefined" == typeof i.data("selectric-ignore")) {
                var r = i.closest("." + n.classes.wrapper),
                    c = r.find(".label"),
                    o = e('<input class="input" />');
                o.attr("placeholder", c.text()), o.keyup(function(i) {
                    a(e(this).val(), t, n)
                }), c.html(o), o.focus();

                INITIAL = i.val();
            }
        },
        a = function(t, n, i) {
            var a = t.toLowerCase(),
                r = e(i.$li);
            r.each(function(t, n) {
                n = e(n);
                var i = n.text().toLowerCase();
                return i.indexOf(a) >= 0 ? n.show() : n.hide()
            })
        };
    n.add("Open", t, i);
    n.add("Change", t, function(t, n) {
        if (this.id === 'main_cat_order') {
            var desg = jQuery('#designer_user');

            desg.val('');
            desg.selectric('refresh');
        } else if (this.id === 'designer_user') {
            var main = jQuery('#main_cat_order');

            main.val('');
            main.selectric('refresh');
        }

        if (e(t).val()) {
            if (INITIAL === e(t).val()) return;

            document.latest.submit();
        }
    });
});