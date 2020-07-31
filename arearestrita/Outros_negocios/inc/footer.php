</body>
</html>

<script>
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };

    var uid = getUrlParameter('uid');
    if (typeof uid !== 'undefined') {
        $("#modal-novasenha").modal();
    }

    //var modal = getUrlParameter('modal');
    //if (typeof modal !== 'undefined') {
    //    $("#modal-"+modal).modal();
    //}

</script>