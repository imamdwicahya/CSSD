<div class="w3-bar w3-card w3-white" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
        <i class="fa fa-bars"></i>
    </a>
    <a href="<?php echo base_url('/site/halamanUtama/'); ?>" class="w3-bar-item w3-button"><i class="fa fa-home"></i> HOME</a>
    <!--javascript untuk dialog cari ada dikelas view aktivitas_inventaris paling bawah-->
    <a onclick="document.getElementById('id01').style.display = 'block'"  class="w3-bar-item w3-button"><i class="fa fa-search"></i> CARI</a>
    <!--javascript untuk jam aktif ada dikelas view aktivitas_inventaris paling atas-->
    <b id='clock' class="w3-bar-item w3-button w3-animate-opacity"></b>
</div>
<script>
//tidak boleh KEMBALI
    (function(global) {

        if (typeof (global) === "undefined") {
            throw new Error("window is undefined");
        }

        var _hash = "!";
        var noBackPlease = function() {
            global.location.href += "#";

            // making sure we have the fruit available for juice (^__^)
            global.setTimeout(function() {
                global.location.href += "!";
            }, 50);
        };

        global.onhashchange = function() {
            if (global.location.hash !== _hash) {
                global.location.hash = _hash;
            }
        };

        global.onload = function() {
            noBackPlease();

            // disables backspace on page except on input fields and textarea..
            document.body.onkeydown = function(e) {
                var elm = e.target.nodeName.toLowerCase();
                if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
                    e.preventDefault();
                }
                // stopping event bubbling up the DOM tree..
                e.stopPropagation();
            };
        }

    })(window);
</script>