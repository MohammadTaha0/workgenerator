<!-- Favicon -->
<link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Libraries Stylesheet -->
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">



<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>


<link rel="stylesheet" href="./css/virtual-select.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="./js/virtual-select.min.js"></script>
<script type="text/javascript">
    VirtualSelect.init({
        ele: '#multi_option'
    });
</script>
<script src="./timeago/jquery.timeago.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $("time.timeago").timeago();
    });
</script>
<script>
    $(document).ready(function() {


        setInterval(function() {
            $("span[data-role=left]").each(function remainingTime() {
                var date = $(this).data('id');
                var curdate = Math.abs((new Date().getTime() / 1000).toFixed(0));
                var date2 = Math.abs((new Date(date).getTime() / 1000).toFixed(0))
                var diff = date2 - curdate;
                var days = Math.floor(diff / 86400);
                var hours = Math.floor(diff / 3600) % 24;
                var mins = Math.floor(diff / 60) % 60;
                var secs = (diff % 60);

                if (days == -1) {
                    days = days * -1;
                    $(this).text("Last Date: Today")
                } else if (days == 0) {
                    days = days * -1;
                    $(this).text("Last Date: Tomorrow")
                } else if (days < 0) {
                    days = days * -1;
                    days = days - 1;
                    $(this).text(days + " Days Ago")
                } else {
                    if (hours < 10) {
                        hours = "0" + hours;
                    }
                    if (mins < 10) {
                        mins = "0" + mins;
                    }
                    if (secs < 10) {
                        secs = "0" + secs;
                    }
                    if (days < 10) {
                        days = "0" + days;
                    }
                    $(this).text(days + " Days" + " Left")
                }
            });
        }, 900)




    });
</script>