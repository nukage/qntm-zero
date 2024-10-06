jQuery(document).ready(function ($) {
    function getToCollapse($element) {
        console.log('getToCollapse', $element);
        if ($element.data("collapse") === "prev") {
            return $element.prev();
        } else if ($element.data("collapse") === "next") {
            return $element.next();
        }
        return null; // Explicitly return null for clarity.
    }

    function nkg_collapse() {    
        if ($("[data-collapse]").length > 0) {
            $("[data-collapse]").each(function (i, element) {
                const $element = $(element);
                const toCollapse = getToCollapse($element);
                if (toCollapse && i > 0) { // Ensure toCollapse is not null
             
                    toCollapse.hide();
                    $element.find("[data-acc-icon]").addClass("-rotate-180");
                } else {
                    toCollapse.data("collapse-open", true);
                }
            });

            console.log('add event handler');
            $("[data-collapse]").on("click", function () {
                console.log('CLICK!');
                var $this = $(this);
                var $toCollapse = getToCollapse($this);
                
                if ($toCollapse && $toCollapse.data("collapse-open")) {
                  $this.find("[data-acc-icon]").addClass("-rotate-180");
                  $toCollapse.data("collapse-open", false);
                  $toCollapse.slideUp(300);
                } else if ($toCollapse) {
                  $this.find("[data-acc-icon]").removeClass("-rotate-180");
                    $toCollapse.data("collapse-open", true);
                    $toCollapse.slideDown(300);
                }
            });
        } else {
            console.log('no collapse found');
        }
    }

    setTimeout(()=> {
      nkg_collapse();
    },300)
});
